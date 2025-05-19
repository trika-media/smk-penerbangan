<?php

namespace App\Livewire\Admin\Benefit;

use Livewire\Component;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use App\Models\BenefitMemilih;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Spatie\LivewireFilepond\WithFilePond;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class Index extends Component
{
    use WithAlert, WithFilePond;

    public $jum_list = 5;

    public $title, $image;
    public $lists = [];

    public function mount() {
        $data = BenefitMemilih::first();
        if($data) {
            $this->title = $data->title;
            $this->jum_list = count($data->lists);
            for($i = 1; $i <= count($data->lists); $i++) {
                $this->lists[$i] = $data->lists[$i];
            }
        }
    }

    public function increase() {
        if($this->jum_list < 15) {
            $this->jum_list++;
        } else {
            $this->alertEvent('Benefit Tidak boleh lebih dari 15 list!', 'warning');
        }
    }

    public function decrease() {
        if($this->jum_list > 1) {
            $this->jum_list--;
        } else {
            $this->alertEvent('Benefit Tidak boleh kurang dari 1 list!', 'warning');
        }
    }

    public function save() {
        if($this->image) {
            $validate = $this->validate([
                'title' => 'required|max:100',
                'lists.*' => 'required',
                'image' => 'required|file|image|mimes:png,jpg,jpeg,svg|max:2048'
            ]);
        } else {
            $validate = $this->validate([
                'title' => 'required|max:100',
                'lists.*' => 'required'
            ]);
        }

        try {
            if ($this->image) {
                $filename = 'HOMEPAGE_' . Str::orderedUuid() . '.' . $validate['image']->getClientOriginalExtension();
            } else {
                $filename = false;
            }

            if(BenefitMemilih::first()) {
                if($filename) {
                    if(Storage::disk('homepage')->exists($validate['image'])) {
                        Storage::disk('homepage')->delete($validate['image']);
                    }
                    optimize_image($validate['image'], 'homepage', $filename);
                }
                $data = BenefitMemilih::find(BenefitMemilih::first()->id);
                $data->title = $validate['title'];
                $data->lists = $validate['lists'];
                if($filename) {
                    $data->image = $filename;
                }
                $data->save();
            } else {
                optimize_image($validate['image'], 'homepage', $filename);
                BenefitMemilih::create([
                    'title' => $validate['title'],
                    'lists' => $validate['lists'],
                    'image' => $filename
                ]);
            }

            $this->alertEvent('Data Sukses Disimpan', 'success');
        } catch (\Exception $e) {
            $this->alertEvent('Data Gagal Disimpan', 'danger');
        }
    }

    public function render()
    {
        return view('admin.benefit.index');
    }
}

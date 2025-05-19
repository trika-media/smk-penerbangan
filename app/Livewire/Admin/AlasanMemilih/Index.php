<?php

namespace App\Livewire\Admin\AlasanMemilih;

use Livewire\Component;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use App\Models\AlasanMemilih;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Spatie\LivewireFilepond\WithFilePond;
use Spatie\LaravelImageOptimizer\Facades\ImageOptimizer;

class Index extends Component
{
    use WithAlert, WithFilePond;

    public $jum_list = 9;

    public $title ,$url_pendaftaran ,$ringkasan, $image;
    public $lists = [];

    public function mount() {
        $data = AlasanMemilih::first();
        if($data) {
            $this->title = $data->title;
            $this->url_pendaftaran = $data->url_pendaftaran;
            $this->ringkasan = $data->ringkasan;
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
            $this->alertEvent('List Tidak boleh lebih dari 15 list!', 'warning');
        }
    }

    public function decrease() {
        if($this->jum_list > 1) {
            $this->jum_list--;
        } else {
            $this->alertEvent('List Tidak boleh kurang dari 1 list!', 'warning');
        }
    }

    public function save() {
        if($this->image) {
            $validate = $this->validate([
                'title' => 'required|max:100',
                'url_pendaftaran' => 'required|url:http,https',
                'ringkasan' => 'required|max:500',
                'lists.*' => 'required',
                'image' => 'required|file|image|mimes:png,jpg,jpeg,svg|max:2048'
            ]);
        } else {
            $validate = $this->validate([
                'title' => 'required|max:100',
                'url_pendaftaran' => 'required|url:http,https',
                'ringkasan' => 'required|max:500',
                'lists.*' => 'required'
            ]);
        }

        try {
            if ($this->image) {
                $filename = 'HOMEPAGE_' . Str::orderedUuid() . '.' . $validate['image']->getClientOriginalExtension();
            } else {
                $filename = false;
            }

            if(AlasanMemilih::first()) {
                if($filename) {
                    if(Storage::disk('homepage')->exists($validate['image'])) {
                        Storage::disk('homepage')->delete($validate['image']);
                    }
                    optimize_image($validate['image'], 'homepage', $filename);
                }
                $data = AlasanMemilih::find(AlasanMemilih::first()->id);
                $data->title = $validate['title'];
                $data->url_pendaftaran = $validate['url_pendaftaran'];
                $data->ringkasan = $validate['ringkasan'];
                $data->lists = $validate['lists'];
                if($filename) {
                    $data->image = $filename;
                }
                $data->save();
            } else {
                optimize_image($validate['image'], 'homepage', $filename);
                AlasanMemilih::create([
                    'title' => $validate['title'],
                    'url_pendaftaran' => $validate['url_pendaftaran'],
                    'ringkasan' => $validate['ringkasan'],
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
        return view('admin.alasan-memilih.index');
    }
}

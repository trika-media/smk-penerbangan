<?php

namespace App\Livewire\Admin\BlogMengapaSmk;

use App\Models\BlogMengapaSmk;
use Livewire\Component;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use Spatie\LivewireFilepond\WithFilePond;

class Form extends Component
{
    use WithFilePond, WithAlert;

    public $id,$title,$slug,$image_header,$konten;

    public function mount($id) {
        $this->id = $id;
        $data = BlogMengapaSmk::pluck('id')->toArray();
        if((!in_array($id, $data)) && ($id != 'tambah')) {
            return to_route('blog-mengapa-smk.index');
        }
        if($id != 'tambah') {
            $data = BlogMengapaSmk::find($id);
            $this->title = $data->title;
            $this->konten = $data->konten;
            $this->slug = $data->slug;
        }
    }

    public function updatedTitle() {
        $this->slug = strtolower(str_replace(' ', '-', $this->title));
        $this->slug = preg_replace('/[^A-Za-z0-9\-]/', '', $this->slug);
    }

    public function save()
    {
        if (($this->id != 'tambah') && !$this->image_header) {
            $validate = $this->validate([
                'title' => 'required',
                'slug' => 'required|unique:beritas,slug,' . $this->id,
                'konten' => 'required',
            ]);
        } else {
            $validate = $this->validate([
                'title' => 'required',
                'slug' => 'required|unique:beritas,slug',
                'konten' => 'required',
                'image_header' => 'required|image|file|mimes:png,jpeg,jpg',
            ]);
        }

        try {
            if ($this->image_header) {
                $filename = 'NEWS_' . Str::orderedUuid() . '.' . $validate['image_header']->getClientOriginalExtension();
            } else {
                $filename = false;
            }
            
            if ($this->id != 'tambah') {
                $data = BlogMengapaSmk::findOrFail($this->id);
                $data->update([
                    'title' => $validate['title'],
                    'author' => auth()->user()->name,
                    'slug' => $this->slug,
                    'konten' => $validate['konten'],
                ]);

                if ($filename) {
                    optimize_image($validate['image_header'], 'news', $filename);
                    $data->update([
                        'image_header' => $filename,
                    ]);
                }
            } else {
                optimize_image($validate['image_header'], 'news', $filename);
                BlogMengapaSmk::create([
                    'title' => $validate['title'],
                    'author' => auth()->user()->name,
                    'slug' => $this->slug,
                    'konten' => $validate['konten'],
                    'image_header' => $filename,
                ]);
            }

            $this->alert('Berhasil!', 'success', 'Data Sukses Ditambahkan');
            return to_route('blog-mengapa-smk.index');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Gagal!', 'danger', 'Data Gagal Ditambahkan');
        }
    }

    public function render()
    {
        return view('admin.blog-mengapa-smk.form');
    }
}

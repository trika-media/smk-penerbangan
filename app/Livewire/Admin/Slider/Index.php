<?php

namespace App\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use Spatie\Image\Image;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use App\Traits\WithPerPagePagination;
use Illuminate\Support\Facades\Storage;
use Spatie\LivewireFilepond\WithFilePond;

class Index extends Component
{
    use WithFilePond, WithAlert, WithPerPagePagination;

    public $filters = [
        'search' => ''
    ];
    public $main_title, $description_title, $order, $image, $delete_id, $edit_id;

    public function resetFilters() {
        $this->reset('main_title','description_title','order','image','delete_id','edit_id');
    }

    public function cancelEdit()
    {
        $this->resetFilters();
        $this->dispatch('closemodalCreate');
    }

    public function cancelDelete()
    {
        $this->resetFilters();
        $this->dispatch('closedeleteModal');
    }

    public function deleteSelected($id)
    {
        $this->delete_id = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData()
    {
        $id = $this->delete_id;
        $data = Slider::findOrFail($id);
        if (Storage::disk('slider')->exists($data->image)) {
            Storage::disk('slider')->delete($data->image);
        }
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }
    
    public function editMode($id)
    {
        $data = Slider::findOrFail($id);
        $this->edit_id = $id;
        $this->main_title = $data->main_title;
        $this->description_title = $data->description;
        $this->active = $data->active;
        $this->dispatch('openmodalCreate');
    }

    public function save()
    {
        if ($this->edit_id && !$this->image) {
            $validate = $this->validate([
                'main_title' => 'required|max:50',
                'description_title' => 'required|max:100',
            ]);
        } else {
            $validate = $this->validate([
                'main_title' => 'required|max:50',
                'description_title' => 'required|max:100',
                'image' => 'required|image|file|mimes:png,jpeg,jpg',
            ]);
        }

        try {
            if ($this->image) {
                $filename = 'SLIDER_' . Str::orderedUuid() . '.' . $validate['image']->getClientOriginalExtension();
            } else {
                $filename = false;
            }
            
            if ($this->edit_id) {
                $data = Slider::findOrFail($this->edit_id);
                $data->update([
                    'main_title' => $validate['main_title'],
                    'description' => $validate['description_title'],
                    'active' => true,
                ]);

                if ($filename) {
                    optimize_image($validate['image'], 'slider', $filename);
                    $data->update([
                        'image' => $filename,
                    ]);
                }
            } else {
                optimize_image($validate['image'], 'slider', $filename);
                Slider::create([
                    'main_title' => $validate['main_title'],
                    'description' => $validate['description_title'],
                    'image' => $filename,
                    'active' => true,
                ]);

            }
            $this->resetFilters();
            $this->alertEvent('Berhasil!', 'success', 'Data Sukses Ditambahkan');
            $this->dispatch('closemodalCreate');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Gagal!', 'danger', 'Data Gagal Ditambahkan');
        }
    }

    public function getRowsProperty()
    {
        $data = Slider::when($this->filters['search'], function($query, $value) {
            return $query->where('main_title', 'LIKE', '%' . $value . '%');
        })
        ->latest();

        return $this->applyPagination($data);
    }

    public function render()
    {
        return view('admin.slider.index', [
            'rows' => $this->rows,
        ]);
    }
}

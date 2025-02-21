<?php

namespace App\Livewire\Admin\BiodataSingkat;

use App\Models\Biodata;
use Livewire\Component;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Storage;
use Spatie\LivewireFilepond\WithFilePond;

#[On('render_again')]
class Index extends Component
{
    use WithFilePond, WithAlert;
    
    public $biodata, $image, $data, $delete;

    public function mount() {
        $data = Biodata::get();
        if(!$data->isEmpty()) {
            $this->biodata = $data->where('type', 'biodata')->first()->value;
            $this->data = $data;
        }
    }

    public function resetFilters() {
        $this->reset('delete');
    }

    public function cancelDelete()
    {
        $this->resetFilters();
        $this->dispatch('closedeleteModal');
    }

    public function deleteSelected($id)
    {
        $this->delete = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData()
    {
        $id = $this->delete;
        $data = Biodata::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->dispatch('render_again');
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function save() {
        if ($this->image) {
            $validate = $this->validate([
                'biodata' => 'required',
                'image' => 'required|file|image|mimes:png,jpg,jpeg,svg|max:2048'
            ]);
        } else {
            $validate = $this->validate([
                'biodata' => 'required'
            ]);
        }

        try {
            if ($this->image) {
                $filename = 'BIODATA_' . Str::orderedUuid() . '.' . $validate['image']->getClientOriginalExtension();
            } else {
                $filename = false;
            }

            if(Biodata::where('type', 'biodata')->first() || $validate['biodata']) {
                Biodata::where('type', 'biodata')->delete();
                Biodata::create([
                    'type' => 'biodata',
                    'value' => $validate['biodata']
                ]);
            } 
            if($filename) {
                $count = Biodata::where('type', 'biodata_image')->count();
                if($count > 7) {
                    $this->alertEvent('Maksimal hanya 7 gambar, Silahkan hapus beberapa gambar!', 'danger');
                }
                optimize_image($validate['image'], 'biodata', $filename);
                Biodata::create([
                    'type' => 'biodata_image',
                    'value' => $filename
                ]);
                return redirect()->route('biodata-singkat.index');
            }

            $this->alertEvent('Data Sukses Disimpan', 'success');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Data Gagal Disimpan', 'danger');
        }
    }

    public function getImageRowProperty() {
        return $this->data->where('type', 'biodata_image');
    }

    public function render()
    {
        return view('admin.biodata-singkat.index', [
            'image_row' => $this->image_row
        ]);
    }
}

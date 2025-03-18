<?php

namespace App\Livewire\Admin\Facility;

use Livewire\Component;
use App\Models\Fasilitas;
use App\Traits\WithAlert;
use Illuminate\Support\Str;
use App\Traits\WithPerPagePagination;
use Spatie\LivewireFilepond\WithFilePond;

class Index extends Component
{
    use WithPerPagePagination, WithFilePond, WithAlert;

    public $edit, $delete, $nama, $kategori;

    public function resetFilters() {
        $this->reset('nama', 'kategori', 'edit', 'delete');
    }

    public function rules() {
        return [
            'nama' => 'required|max:255',
            'kategori' => 'required'
        ];
    }

    public function cancelEdit()
    {
        $this->resetFilters();
        $this->dispatch('closemodalCreate');
        $this->dispatch('closemodalImage');
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
        $data = Fasilitas::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function editMode($id)
    {
        $data = Fasilitas::findOrFail($id);
        $this->edit = $id;
        $this->nama = $data->nama;
        $this->kategori = $data->kategori;
        $this->dispatch('openmodalCreate');
    }

    public function save() {
        $validate = $this->validate();

        try {
            if($this->edit) {
                $data = Fasilitas::find($this->edit);
                $data->update([
                    'kategori' => $this->kategori,
                    'nama' => $this->nama
                ]);
            } else {
                Fasilitas::create([
                    'kategori' => $this->kategori,
                    'nama' => $this->nama
                ]);
            }
            $this->resetFilters();

            $this->alertEvent('Data sukses disimpan', 'success');
            $this->dispatch('closemodalCreate');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Data gagal disimpan', 'danger');
            $this->dispatch('closemodalCreate');
        }
    }

    public function saveImage() {
        $this->validate([
            'nama' => 'required|file|image|max:2048|mimes:png,jpg,jpeg'
        ]);

        try {
            $filename = 'FACILITY_' . Str::orderedUuid() . '.' . $this->nama->getClientOriginalExtension();
            optimize_image($this->nama, 'fasilitas', $filename);
            Fasilitas::create([
                'kategori' => 'image',
                'nama' => $filename
            ]);
            $this->resetFilters();

            $this->alertEvent('Data sukses disimpan', 'success');
            $this->dispatch('closemodalImage');
        } catch (\Exception $e) {
            dd($e);
            $this->alertEvent('Data gagal disimpan', 'danger');
            $this->dispatch('closemodalImage');
        }
    }

    public function getRowsProperty() {
        return $this->applyPagination(Fasilitas::latest());
    }

    public function render()
    {
        return view('admin.facility.index', [
            'rows' => $this->rows
        ]);
    }
}

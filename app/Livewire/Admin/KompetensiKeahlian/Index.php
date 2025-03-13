<?php
namespace App\Livewire\Admin\KompetensiKeahlian;

use App\Models\KompetensiKeahlian;
use App\Traits\WithAlert;
use App\Traits\WithPerPagePagination;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Spatie\LivewireFilepond\WithFilePond;

class Index extends Component
{
    use WithAlert, WithPerPagePagination, WithFilePond;

    public $nama, $deskripsi, $image, $edit, $delete;

    public function editMode($id)
    {
        $data            = KompetensiKeahlian::findOrFail($id);
        $this->edit      = $id;
        $this->nama      = $data->nama;
        $this->deskripsi = $data->deskripsi;

        $this->dispatch('openmodalCreate');
    }

    public function save()
    {
        if($this->image && $this->edit) {
            $validate = $this->validate([
                'nama'      => 'required',
                'deskripsi' => 'required',
                'image'     => 'required|file|image|mimes:png,jpg,jpeg|max:2048'
            ]);
        } elseif($this->edit) {
            $validate = $this->validate([
                'nama'      => 'required',
                'deskripsi' => 'required'
            ]);
        } else {
            $validate = $this->validate([
                'nama'      => 'required',
                'deskripsi' => 'required',
                'image'     => 'required|file|image|mimes:png,jpg,jpeg|max:2048'
            ]);
        }
        try {
            if ($this->image) {
                $filename = 'HOMEPAGE_' . Str::orderedUuid() . '.' . $validate['image']->getClientOriginalExtension();
            } else {
                $filename = false;
            }
            if ($filename) {
                optimize_image($validate['image'], 'homepage', $filename);
                $validate['image'] = $filename;
            }
            if ($this->edit) {
                $komp = KompetensiKeahlian::findOrFail($this->edit);
                if ($filename) {
                    if (Storage::disk('homepage')->exists($komp->image)) {
                        Storage::disk('homepage')->delete($komp->image);
                    }
                }
                $komp->update($validate);
            } else {
                KompetensiKeahlian::create($validate);
            }

            $this->dispatch('closemodalCreate');
            $this->reset('nama', 'deskripsi');

            $this->alertEvent("Data Sukses Ditambahkan", "success");
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function cancelEdit()
    {
        $this->edit = null;
        $this->dispatch('closemodalCreate');
    }

    public function cancelDelete()
    {
        $this->delete = null;
        $this->dispatch('closedeleteModal');
    }

    public function deleteSelected($id)
    {
        $this->delete = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData()
    {
        try {
            KompetensiKeahlian::findOrFail($this->delete)->delete();

            $this->alertEvent("Data Sukses Dihapus", "success");
            $this->dispatch('closedeleteModal');
        } catch (\Exception $e) {
            $this->alertEvent("Data Gagal Dihapus", "danger");
            $this->dispatch('closedeleteModal');
        }
    }

    public function getRowsProperty()
    {
        $data = KompetensiKeahlian::latest();
        return $this->applyPagination($data);
    }

    public function render()
    {
        return view('admin.kompetensi-keahlian.index', [
            'rows' => $this->rows,
        ]);
    }
}

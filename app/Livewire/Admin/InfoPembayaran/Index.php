<?php

namespace App\Livewire\Admin\InfoPembayaran;

use Livewire\Component;
use App\Traits\WithAlert;
use App\Models\Pembayaran;
use App\Models\PeriodePendaftaran;
use App\Traits\WithPerPagePagination;

class Index extends Component
{
    use WithPerPagePagination, WithAlert;

    public $edit, $delete, $deskripsi, $jumlah, $semester = '';

    public function rules() {
        return [
            'deskripsi' => 'required|max:255',
            'jumlah' => 'required|integer',
            'semester' => 'required|max:255',
        ];
    }

    public function resetFilters() {
        $this->reset('edit', 'delete', 'deskripsi', 'jumlah', 'semester');
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
        $this->delete = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData()
    {
        $id = $this->delete;
        $data = Pembayaran::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function editMode($id)
    {
        $data = Pembayaran::findOrFail($id);
        $this->edit = $id;
        $this->deskripsi = $data->deskripsi;
        $this->jumlah = $data->jumlah;
        $this->semester = $data->semester;
        $this->dispatch('openmodalCreate');
    }

    public function save() {
        $validate = $this->validate();

        try {
            if($this->edit) {
                $data = Pembayaran::find($this->edit);
                $data->update([
                    'deskripsi' => $this->deskripsi,
                    'jumlah' => $this->jumlah,
                    'semester' => $this->semester,
                ]);
            } else {
                Pembayaran::create([
                    'deskripsi' => $this->deskripsi,
                    'jumlah' => $this->jumlah,
                    'semester' => $this->semester,
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

    public function getRowsProperty() {
        return $this->applyPagination(Pembayaran::latest());
    }

    public function render()
    {
        return view('admin.info-pembayaran.index', [
            'rows' => $this->rows,
            'periode_pendaftaran' => PeriodePendaftaran::get()
        ]);
    }
}

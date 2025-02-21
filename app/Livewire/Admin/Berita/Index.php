<?php

namespace App\Livewire\Admin\Berita;

use App\Models\Berita;
use Livewire\Component;
use App\Traits\WithAlert;
use App\Traits\WithPerPagePagination;

class Index extends Component
{
    use WithPerPagePagination, WithAlert;

    public $delete;

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
        $data = Berita::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function getRowsProperty() {
        return $this->applyPagination(Berita::latest());
    }

    public function render()
    {
        return view('admin.berita.index', [
            'rows' => $this->rows
        ]);
    }
}

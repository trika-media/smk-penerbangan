<?php

namespace App\Livewire\Admin\Pendaftaran;

use Livewire\Component;
use App\Traits\WithAlert;
use App\Models\Pendaftaran;
use Maatwebsite\Excel\Facades\Excel;
use App\Traits\WithPerPagePagination;
use App\Exports\PendaftaranDataExport;

class Index extends Component
{
    use WithPerPagePagination, WithAlert;

    public $delete;

    public function exportExcel() {
        $timestamp = date('Y_m_d_H_i_s');
        return Excel::download(new PendaftaranDataExport($this->rowsQuery->get()), 'pendaftaran_data_'.$timestamp.'.xlsx');
    }

    public function declineData($id) {
        $data = Pendaftaran::findOrFail($id);
        $data->update([
            'accepted' => 0
        ]);
        $this->alertEvent('Pendaftaran Telah Ditolak!', 'danger', 'Silahkan Hubungi Yang Bersangkutan!');
    }

    public function acceptData($id) {
        $data = Pendaftaran::findOrFail($id);
        $data->update([
            'accepted' => 1
        ]);
        $this->alertEvent('Pendaftaran Telah Diterima!', 'success', 'Silahkan Hubungi Yang Bersangkutan!');
    }

    public function deleteSelected($id) {
        $this->delete = $id;
        $this->dispatch('opendeleteModal');
    }

    public function deleteData() {
        $data = Pendaftaran::findOrFail($this->delete);
        $data->delete();
        $this->alertEvent('Data Telah Dihapus!', 'success');
        $this->dispatch('closedeleteModal');
    }

    public function getRowsQueryProperty() {
        return Pendaftaran::with('jurusanData')->latest();
    }

    public function getRowsProperty() {
        return $this->applyPagination($this->rowsQuery);
    }

    public function render()
    {
        return view('admin.pendaftaran.index', [
            'rows' => $this->rows
        ]);
    }
}

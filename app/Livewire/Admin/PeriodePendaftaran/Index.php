<?php
namespace App\Livewire\Admin\PeriodePendaftaran;

use Carbon\Carbon;
use Livewire\Component;
use App\Traits\WithAlert;
use App\Models\PeriodePendaftaran;
use App\Traits\WithPerPagePagination;

class Index extends Component
{
    use WithPerPagePagination, WithAlert;

    public $tanggal_berlaku_awal, $tanggal_berlaku_akhir, $gelombang, $edit, $delete;

    public function rules()
    {
        return [
            'tanggal_berlaku_awal'  => 'required|date',
            'tanggal_berlaku_akhir' => 'required|date|after:tanggal_berlaku_awal',
            'gelombang'             => 'required|max:255',
        ];
    }

    public function mount()
    {
        $this->tanggal_berlaku_awal = now()->format("Y-m-d");
    }

    public function resetFilters()
    {
        $this->reset('edit', 'delete', 'tanggal_berlaku_awal', 'tanggal_berlaku_akhir', 'gelombang');
        $this->tanggal_berlaku_awal = now()->format("Y-m-d");
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
        $id   = $this->delete;
        $data = PeriodePendaftaran::findOrFail($id);
        $data->delete();
        $this->resetFilters();
        $this->alertEvent('Berhasil!', 'success', 'Data Berhasil Dihapus');
        $this->dispatch('closedeleteModal');
    }

    public function editMode($id)
    {
        $data                        = PeriodePendaftaran::findOrFail($id);
        $this->edit                  = $id;
        $this->tanggal_berlaku_awal  = $data->tanggal_berlaku_awal->format("Y-m-d");
        $this->tanggal_berlaku_akhir = $data->tanggal_berlaku_akhir->format("Y-m-d");
        $this->gelombang             = $data->gelombang;
        $this->dispatch('openmodalCreate');
    }

    public function save()
    {
        $validate = $this->validate();

        try {
            if ($this->edit) {
                $data        = PeriodePendaftaran::find($this->edit);
                $year_first  = Carbon::parse($this->tanggal_berlaku_awal)->format("Y");
                $year_second = Carbon::parse($this->tanggal_berlaku_akhir)->format("Y");
                if ($year_first == $year_second) {
                    $year_second = (int) $year_second + 1;
                }
                $data->update([
                    'tanggal_berlaku_awal'  => $this->tanggal_berlaku_awal,
                    'tanggal_berlaku_akhir' => $this->tanggal_berlaku_akhir,
                    'gelombang'             => $this->gelombang,
                    'tahun_ajar'            => $year_first . '/' . $year_second,
                ]);
            } else {
                $year_first  = Carbon::parse($this->tanggal_berlaku_awal)->format("Y");
                $year_second = Carbon::parse($this->tanggal_berlaku_akhir)->format("Y");
                if ($year_first == $year_second) {
                    $year_second = (int) $year_second + 1;
                }
                PeriodePendaftaran::create([
                    'tanggal_berlaku_awal'  => $this->tanggal_berlaku_awal,
                    'tanggal_berlaku_akhir' => $this->tanggal_berlaku_akhir,
                    'gelombang'             => $this->gelombang,
                    'tahun_ajar'            => $year_first . '/' . $year_second,
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

    public function getRowsProperty()
    {
        return $this->applyPagination(PeriodePendaftaran::orderBy('gelombang', 'desc'));
    }

    public function render()
    {
        return view('admin.periode-pendaftaran.index', [
            'rows' => $this->rows,
        ]);
    }
}

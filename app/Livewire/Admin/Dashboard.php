<?php
namespace App\Livewire\Admin;

use App\Models\KompetensiKeahlian;
use App\Models\Pendaftaran;
use App\Models\PeriodePendaftaran;
use Carbon\Carbon;
use Livewire\Component;

class Dashboard extends Component
{
    public function getPendaftaranProperty()
    {
        $data = [];
        foreach (array_map(fn($month) => Carbon::create(null, $month), range(1, 12)) as $months) {
            $data[$months->translatedFormat("F")] = Pendaftaran::whereIn('periode',
                    PeriodePendaftaran::whereDate('tanggal_berlaku_awal', '>=', $months->format("Y-m-d")
                )
                    ->whereDate('tanggal_berlaku_akhir', '<=', $months->endOfMonth()->format("Y-m-d"))
                    ->pluck('id'))->count();
        }
        return $data;
    }

    public function render()
    {
        return view('admin.dashboard', [
            'pendaftaran_data' => $this->pendaftaran,
            'pendaftar_count'  => Pendaftaran::count(),
            'jurusan_count'    => KompetensiKeahlian::count(),
            'periode_count'    => PeriodePendaftaran::count(),
        ]);
    }
}

<?php
namespace App\Livewire\FormPendaftaran;

use App\Models\KompetensiKeahlian;
use App\Models\Pembayaran;
use App\Models\Pendaftaran;
use App\Models\PeriodePendaftaran;
use App\Traits\WithAlert;
use Livewire\Component;

class Index extends Component
{
    use WithAlert;

    public $nama = '', $email = '', $nohp = '', $tempat_lahir = '', $tanggal_lahir, $asal_sekolah = '', $jk = '', $agama = '', $jurusan = '', $nama_ibu    = '', $nohp_ibu    = '';

    public function rules()
    {
        return [
            'nama'          => 'required|unique:pendaftarans,nama',
            'email'         => 'required|unique:pendaftarans,email|email:dns',
            'nohp'          => 'required|min:10',
            'tempat_lahir'  => 'required',
            'tanggal_lahir' => 'required|date',
            'asal_sekolah'  => 'required',
            'jk'            => 'required',
            'agama'         => 'required',
            'jurusan'       => 'required',
            'nama_ibu'      => 'required',
            'nohp_ibu'      => 'required',
        ];
    }

    public function save()
    {
        $validate      = $this->validate();
        $id_pembayaran = PeriodePendaftaran::where('tanggal_berlaku_awal', '<=', now()->format("Y-m-d"))
            ->where('tanggal_berlaku_akhir', '>=', now()->format("Y-m-d"))
            ->first();
        if ($id_pembayaran) {
            $validate['periode'] = $id_pembayaran->id;
        } else {
            $this->alertEvent('Pendaftaran Ditolak!', 'warning', 'Pendaftaran Belum Berlaku!');
            return;
        }
        try {
            Pendaftaran::create($validate);
            $this->alert('success', 'Form Sukses Dikirim!', 'Silahkan hubungi admin, untuk info lebih lanjut!');
            return to_route('form-pendaftaran.index');
        } catch (\Exception $e) {
            $this->alertEvent('Form Gagal Dikirim!', 'danger',  'Silahkan hubungi admin, untuk info lebih lanjut!');
        }
    }

    public function render()
    {
        $id_pembayaran = PeriodePendaftaran::where('tanggal_berlaku_awal', '<=', now()->format("Y-m-d"))
            ->where('tanggal_berlaku_akhir', '>=', now()->format("Y-m-d"))
            ->first();
        return view('form-pendaftaran.index', [
            'detail_pembayaran' => Pembayaran::where('semester', $id_pembayaran?->id)->get(),
            'info_pembayaran'   => $id_pembayaran,
            'jurusan_data'      => KompetensiKeahlian::get(),
        ])->layout('components.layouts.home');
    }
}

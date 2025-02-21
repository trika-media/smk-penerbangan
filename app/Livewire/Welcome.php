<?php

namespace App\Livewire;

use App\Models\Faq;
use App\Models\Berita;
use App\Models\Slider;
use App\Models\Biodata;
use Livewire\Component;
use App\Models\Pembayaran;
use App\Models\AlasanMemilih;
use App\Models\BenefitMemilih;
use App\Models\KompetensiKeahlian;
use App\Models\PeriodePendaftaran;

class Welcome extends Component
{
    public function render()
    {
        $id_pembayaran = PeriodePendaftaran::where('tanggal_berlaku_awal', '>=', now()->format("Y-m-d"))
        ->where('tanggal_berlaku_akhir', '>=', now()->format("Y-m-d"))->first();
        return view('welcome', [
            'alasan_memilih' => AlasanMemilih::first(),
            'jurusan' => KompetensiKeahlian::get(),
            'detail_pembayaran' => Pembayaran::where('semester', $id_pembayaran?->id)->get(),
            'faq' => Faq::get(),
            'benefit_memilih' => BenefitMemilih::first(),
            'biodata' => Biodata::get(),
            'slider' => Slider::get(),
            'berita' => Berita::limit(10)->get(),
            'info_pembayaran' => $id_pembayaran
        ])->layout('components.layouts.home');
    }
}

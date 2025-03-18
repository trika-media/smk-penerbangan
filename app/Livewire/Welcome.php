<?php

namespace App\Livewire;

use App\Models\Faq;
use App\Models\Berita;
use App\Models\Slider;
use App\Models\Biodata;
use App\Models\Visitor;
use Livewire\Component;
use App\Models\Fasilitas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Models\AlasanMemilih;
use App\Models\BenefitMemilih;
use App\Models\KompetensiKeahlian;
use App\Models\PeriodePendaftaran;

class Welcome extends Component
{
    public function render(Request $req)
    {
        $id_pembayaran = PeriodePendaftaran::where('tanggal_berlaku_awal', '<=', now()->format("Y-m-d"))
        ->where('tanggal_berlaku_akhir', '>=', now()->format("Y-m-d"))
        ->first();

        Visitor::create([
            'ip_address' => $req->ip(),
            'user_agent' => $req->userAgent(),
            'date' => now()->format("Y-m-d")
        ]);
        
        return view('welcome', [
            'alasan_memilih' => AlasanMemilih::first(),
            'jurusan' => KompetensiKeahlian::get(),
            'detail_pembayaran' => Pembayaran::where('semester', $id_pembayaran?->id)->get(),
            'faq' => Faq::get(),
            'benefit_memilih' => BenefitMemilih::first(),
            'biodata' => Biodata::get(),
            'slider' => Slider::get(),
            'berita' => Berita::limit(10)->get(),
            'fasilitas' => Fasilitas::get(),
            'info_pembayaran' => $id_pembayaran
        ])->layout('components.layouts.home');
    }
}

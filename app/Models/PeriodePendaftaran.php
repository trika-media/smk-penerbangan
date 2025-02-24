<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class PeriodePendaftaran extends Model
{
    use UUID;

    protected $fillable = [
        'tanggal_berlaku_awal',
        'tanggal_berlaku_akhir',
        'tahun_ajar',
        'gelombang'
    ];

    protected $casts = [
        'tanggal_berlaku_awal' => 'date',
        'tanggal_berlaku_akhir' => 'date'
    ];

    public function getTanggalBerlakuAttribute() {
        return $this->tanggal_berlaku_awal->translatedFormat("l, d F Y") . ' s/d ' . $this->tanggal_berlaku_akhir->translatedFormat("l, d F Y");
    }

    public function getTanggalBerlakuDanGelombangAttribute() {
        return $this->tanggal_berlaku_awal->translatedFormat("l, d F Y") . ' s/d ' . $this->tanggal_berlaku_akhir->translatedFormat("l, d F Y") . ' - Gelombang ' . $this->gelombang;
    }
}

<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class PeriodePendaftaran extends Model
{
    use UUID;

    protected $fillable = [
        'tanggal_berlaku_awal',
        'tanggal_berlaku_akhir',
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

    public function getTahunAjarAttribute() {
        $year_first = $this->tanggal_berlaku_awal->format("Y");
        $year_second = $this->tanggal_berlaku_akhir->format("Y");
        if($year_first == $year_second) {
            $year_second = (int) $year_second + 1;
        }
        return $year_first . '/' . $year_second;
    }
}

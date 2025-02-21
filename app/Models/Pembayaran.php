<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pembayaran extends Model
{
    use UUID;

    protected $fillable = [
        'deskripsi',
        'jumlah',
        'semester'
    ];

    public function getJumlahRupiahAttribute() {
        return 'Rp. ' . number_format($this->jumlah, 0,2);
    }

    public function getSemesterProperty() : HasOne {
        return $this->hasOne(PeriodePendaftaran::class, 'id', 'semester');
    }
}

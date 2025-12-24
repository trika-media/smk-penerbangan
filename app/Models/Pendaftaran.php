<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use UUID;

    protected $fillable = [
        'nama',
        'email',
        'nohp',
        'tempat_lahir',
        'tanggal_lahir',
        'asal_sekolah',
        'jk',
        'nama_ibu',
        'nohp_ibu',
        'agama',
        'periode',
        'accepted',
        'jurusan'
    ];

    protected $casts = [
        'accepted' => 'boolean'
    ];

    public function jurusanData()
    {
        return $this->belongsTo(KompetensiKeahlian::class, 'jurusan', 'id');
    }

    public function getJenisKelaminAttribute() {
        return config('const.JENIS_KELAMIN')[$this->jk]['nama'];
    }

    public function getAgamaValAttribute() {
        return config('const.AGAMA')[$this->agama]['nama'];
    }
}

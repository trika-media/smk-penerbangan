<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KompetensiKeahlian extends Model
{
    protected $fillable = [
        'nama',
        'deskripsi',
        'image'
    ];

    public function pendaftaran() {
        return $this->hasMany(Pendaftaran::class, 'jurusan', 'id');
    }
    
    public function imageUrl() {
        return Storage::disk('homepage')->url($this->image);
    }
}

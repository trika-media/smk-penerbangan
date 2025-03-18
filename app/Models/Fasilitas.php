<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Fasilitas extends Model
{
    use UUID;

    protected $fillable = [
        'kategori',
        'nama'
    ];

    public function imageUrl() {
        return Storage::disk('fasilitas')->url($this->nama);
    }
}

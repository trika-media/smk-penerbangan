<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class AlasanMemilih extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'lists' => 'array'
    ];

    public function imageUrl() {
        return Storage::disk('homepage')->url($this->image);
    }
}
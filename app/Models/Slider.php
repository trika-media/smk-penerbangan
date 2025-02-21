<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    protected $fillable = [
        'main_title',
        'description',
        'image',
        'active'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function imageUrl() {
        return Storage::disk('slider')->url($this->image); 
    }
}

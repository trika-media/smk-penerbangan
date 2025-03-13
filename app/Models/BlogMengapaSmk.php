<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class BlogMengapaSmk extends Model
{
    protected $fillable = [
        'author',
        'title',
        'slug',
        'image_header',
        'konten'
    ];

    public function imageUrl() {
        return Storage::disk('news')->url($this->image_header); 
    }
}

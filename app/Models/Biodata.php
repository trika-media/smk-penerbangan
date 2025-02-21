<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Biodata extends Model
{
    use UUID;

    protected $fillable = [
        'type',
        'value'
    ];

    public function imageUrl() {
        return Storage::disk('biodata')->url($this->value);
    }
}

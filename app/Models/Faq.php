<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use UUID;

    protected $fillable = [
        'question',
        'answer'
    ];
}

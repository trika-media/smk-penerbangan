<?php

namespace App\Models;

use App\Traits\UUID;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use UUID;

    protected $fillable = [
        'config_name',
        'value'
    ];
}

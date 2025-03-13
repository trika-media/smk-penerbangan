<?php

namespace App\Livewire\MengapaSmk;

use Livewire\Component;
use App\Models\BlogMengapaSmk;

class Index extends Component
{
    public function render()
    {
        return view('mengapa-smk.index', [
            'rows' => BlogMengapaSmk::get(),
        ])
        ->layout('components.layouts.home');
    }
}

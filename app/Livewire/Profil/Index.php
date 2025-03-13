<?php

namespace App\Livewire\Profil;

use App\Models\Biodata;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('profil.index', [
            'biodata' => Biodata::get(),
        ])
        ->layout('components.layouts.home');
    }
}

<?php

namespace App\Livewire\JalurPendaftaran;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('jalur-pendaftaran.index')->layout('components.layouts.home');
    }
}

<?php

namespace App\Livewire\Pengumuman;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('pengumuman.index')->layout('components.layouts.home');;
    }
}

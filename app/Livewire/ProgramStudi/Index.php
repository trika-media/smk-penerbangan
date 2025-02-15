<?php

namespace App\Livewire\ProgramStudi;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('program-studi.index')->layout('components.layouts.home');;
    }
}

<?php

namespace App\Livewire\Profil;

use App\Models\Biodata;
use Livewire\Component;

class Index extends Component
{
    public $id;

    public function mount($id) {
        $this->id = $id;
    }

    public function render()
    {
        return view('profil.index', [
            'biodata' => Biodata::where('type', $this->id)->first(),
            'biodata_image' => Biodata::where('type', $this->id . '_image')->get(),
        ])
        ->layout('components.layouts.home');
    }
}

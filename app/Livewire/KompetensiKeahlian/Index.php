<?php

namespace App\Livewire\KompetensiKeahlian;

use Livewire\Component;
use App\Models\KompetensiKeahlian;

class Index extends Component
{
    public function render()
    {
        return view('kompetensi-keahlian.index', [
            'jurusan' => KompetensiKeahlian::get(),
        ])->layout('components.layouts.home');
    }
}

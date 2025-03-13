<?php

namespace App\Livewire\KompetensiKeahlian;

use Livewire\Component;
use App\Models\KompetensiKeahlian;

class Profil extends Component
{
    public $id;

    public function mount($id) {
        $this->id = $id;
    }

    public function getDataProperty() {
        return KompetensiKeahlian::findOrFail($this->id);
    }

    public function render()
    {
        return view('kompetensi-keahlian.profil', [
            'data' => $this->data,
            'jurusan' => KompetensiKeahlian::where('id', '!=', $this->id)->get()
        ])->layout('components.layouts.home');
    }
}

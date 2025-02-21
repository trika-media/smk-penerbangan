<?php

namespace App\Livewire;

use App\Models\Berita as News;
use Livewire\Component;

class Berita extends Component
{
    public $slug;

    public function mount($slug) {
        $this->slug = $slug;
    }

    public function getBeritaProperty() {
        return News::where('slug', $this->slug)->first();
    }

    public function render()
    {
        return view('berita', [
            'berita' => $this->berita,
            'available_berita' => News::where('slug', '!=', $this->slug)->limit(5)->get()
        ])->layout('components.layouts.home');
    }
}

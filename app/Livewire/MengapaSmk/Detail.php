<?php
namespace App\Livewire\MengapaSmk;

use Livewire\Component;
use App\Models\BlogMengapaSmk;

class Detail extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }

    public function getBeritaProperty()
    {
        return BlogMengapaSmk::where('slug', $this->slug)->first();
    }

    public function render()
    {
        return view('mengapa-smk.detail', [
            'berita'           => $this->berita,
            'available_berita' => BlogMengapaSmk::where('slug', '!=', $this->slug)->limit(5)->get(),
        ])->layout('components.layouts.home');
    }
}

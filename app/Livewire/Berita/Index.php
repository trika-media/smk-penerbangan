<?php
namespace App\Livewire\Berita;

use App\Models\Berita as News;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('berita.index', [
            'rows' => News::latest()->paginate(10),
        ])->layout('components.layouts.home');
    }
}

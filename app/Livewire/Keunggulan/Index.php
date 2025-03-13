<?php

namespace App\Livewire\Keunggulan;

use Livewire\Component;
use App\Models\BenefitMemilih;

class Index extends Component
{
    public function render()
    {
        return view('keunggulan.index', [
            'benefit_memilih' => BenefitMemilih::first(),
        ])->layout('components.layouts.home');
    }
}

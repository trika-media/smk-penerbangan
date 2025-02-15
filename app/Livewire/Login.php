<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;

    public $password;

    public $tahun = 'semua';

    public function login()
    {
        $this->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt([
            'email' => $this->email,
            'password' => $this->password,
        ])) {
            return redirect()->route('dashboard');
        } else {
            session()->flash('warning-auth', true);
        }
    }

    public function render()
    {
        return view('login')->layout('components.layouts.blank');
    }
}

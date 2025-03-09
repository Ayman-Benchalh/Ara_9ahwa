<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class Login extends Component
{
    public $email, $password;

    public function login()
    {
        $credentials = $this->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard');
        }

        session()->flash('error', 'Identifiants inconnu.');
    }

    public function render()
    {
        return view('livewire.auth.login')->layout('layouts.app');
    }
}

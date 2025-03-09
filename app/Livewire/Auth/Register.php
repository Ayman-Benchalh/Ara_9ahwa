<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register extends Component
{
    public $name, $email, $password, $password_confirmation;

    public function register()
    {
        $data = $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            "role"=>"admin"
        ]);

        return redirect()->route('login')->with('success', 'Compte créé avec succès.');
    }

    public function render()
    {
        return view('livewire.auth.register')->layout('layouts.app');
    }
}

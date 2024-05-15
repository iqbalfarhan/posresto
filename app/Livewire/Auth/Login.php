<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email = "admin2@admin.com";
    public $password = "admin123";

    public function login()
    {
        $valid = $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $this->redirect(route('home'), true);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}

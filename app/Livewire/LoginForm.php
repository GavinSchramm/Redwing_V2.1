<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public string $email = '';
    public string $password = '';
    public bool $remember = false;
    public ?string $errorMessage = null;

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function submit()
    {
        $this->validate();

        // Attempt to authenticate the user
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            // Authentication successful - regenerate session and redirect
            session()->regenerate();
            return redirect()->intended('/home');
        }

        // Authentication failed
        $this->errorMessage = 'Invalid email or password.';
    }

    public function render()
    {
        return view('livewire.login-form')
            ->layout('layouts.app');
    }
}

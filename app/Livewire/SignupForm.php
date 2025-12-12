<?php

namespace App\Livewire;

use App\Models\User;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class SignupForm extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';
    public ?string $errorMessage = null;

    protected array $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    public function submit()
    {
        $this->validate();

        try {
            // Create the user
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make($this->password),
            ]);

            // Automatically log in the user
            Auth::login($user);

            // Regenerate session and redirect
            session()->regenerate();
            return redirect()->intended('/home');
        } catch (Exception $e) {
            $this->errorMessage = 'An error occurred during registration. Please try again.';
        }
    }

    public function render()
    {
        return view('livewire.signup-form')
            ->layout('layouts.app');
    }
}

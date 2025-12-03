<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\LoginForm;
use App\Livewire\SignupForm;
use App\Livewire\CollectiblesList;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', LoginForm::class)->name('login');
Route::get('/signup', SignupForm::class)->name('signup');

Route::get('/home', CollectiblesList::class)->middleware('auth')->name('home');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

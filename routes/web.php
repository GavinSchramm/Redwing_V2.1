<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\LoginForm;
use App\Livewire\SignupForm;
use App\Livewire\CollectiblesList;
use App\Livewire\CollectiblesCreate;
use App\Livewire\CollectibleDelete;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', LoginForm::class)->name('login');
Route::get('/signup', SignupForm::class)->name('signup');

Route::get('/home', CollectiblesList::class)->middleware('auth')->name('home');

Route::get('/collectibles/create', CollectiblesCreate::class)->middleware('auth')->name('collectibles.create');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

Route::delete('/collectibles/{collectible}', [CollectibleDelete::class, 'destroy'])->name('collectibles.destroy');
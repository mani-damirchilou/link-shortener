<?php

use App\Livewire\Pages\Login;
use App\Livewire\Pages\Register;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
   Route::get('login',Login::class)->name('login');
   Route::get('register',Register::class)->name('register');
});

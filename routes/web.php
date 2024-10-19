<?php

use App\Livewire\Pages\Login;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
   Route::get('/login',Login::class)->name('login');
});

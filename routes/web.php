<?php

use App\Livewire\Pages\Home;
use App\Livewire\Pages\Login;
use App\Livewire\Pages\Register;
use App\Models\Link;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function (){
   Route::get('login',Login::class)->name('login');
   Route::get('register',Register::class)->name('register');
});

Route::get('/',Home::class)->name('index');


Route::get('/link/{link:slug}',function (Link $link){
    $link->updateQuietly([
        'updated_at' => now()
    ]);
    return redirect()->away($link->url);
})->name('link');

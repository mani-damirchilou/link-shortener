<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Login extends Component
{
    #[Validate]
    public string $username = '';
    #[Validate]
    public string $password = '';
    #[Validate]
    public bool $remember = false;

    public function rules()
    {
        return [
            'username' => ['required','string','exists:users'],
            'password' => ['required','string'],
            'remember' => ['bool']
        ];
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.login')->title(__('pages.login.title'));
    }

    public function submit()
    {
        $this->validate();
        if (RateLimiter::tooManyAttempts($this->username,5))
        {
            throw ValidationException::withMessages([
                'username' => __('auth.throttle',['seconds' => RateLimiter::availableIn($this->username)])
            ]);
        }
        RateLimiter::hit($this->username);
        if (!Auth::attempt($this->only('username','password'), $this->remember))
        {
            throw ValidationException::withMessages([
                'username' => __('auth.failed')
            ]);
        }
        session()->regenerate();
        $this->redirectIntended(navigate: true);
    }
}

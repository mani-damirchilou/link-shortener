<?php

namespace App\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Register extends Component
{
    #[Validate]
    public string $username = '';
    #[Validate]
    public string $password = '';
    #[Validate]
    public string $password_confirmation = '';

    public function rules()
    {
        return [
            'username' => ['required','string','min:4','unique:users'],
            'password' => ['required','string','min:8','confirmed'],
        ];
    }
    #[Layout('layouts.guest')]
    public function render()
    {
        return view('livewire.pages.register')->title(__('pages.register.title'));
    }

    public function submit()
    {
        $this->validate();

        $user = User::create($this->only('username','password'));

        Auth::login($user);

        session()->regenerate();

        $this->redirectIntended();
    }
}

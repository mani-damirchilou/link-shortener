<?php

namespace App\Livewire\Pages;

use App\Livewire\MyLinks;
use App\Models\Link;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Home extends Component
{
    #[Validate]
    public string $url = '';

    public string $link = '';

    public function rules()
    {
        return [
            'url' => ['required','url']
        ];
    }
    #[Layout('layouts.app')]
    public function render()
    {
        return view('livewire.pages.home')->title(__('pages.home.title'));
    }

    public function create()
    {
        abort_if(!auth()->check(),401);

        $this->validate();

        $link = auth()->user()->links()->create([
            'url' => $this->url,
            'slug' => Str::random(rand(1,16))
        ]);

        $this->reset('url');

        $this->link = route('link', $link->slug);

        $this->dispatch('link-created')->to(MyLinks::class);
    }
}

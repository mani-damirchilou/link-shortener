<?php

namespace App\Livewire;

use Livewire\Component;

class MyLinks extends Component
{
    public function getListeners()
    {
        return [
            'link-created' => '$refresh',
            'link-deleted' => '$refresh',
        ];
    }

    public function render()
    {
        return view('livewire.my-links')->with([
            'count' => auth()->user()->links()->count(),
            'links' => auth()->user()->links
        ]);
    }
}

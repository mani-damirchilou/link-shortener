<?php

namespace App\Livewire;

use App\Models\Link;
use Livewire\Component;

class LinkItem extends Component
{
    public Link $link;

    public function render()
    {
        return view('livewire.link-item');
    }

    public function mount(Link $link)
    {
        $this->link = $link;
    }

    public function delete()
    {
        $this->authorize('delete', $this->link);
        $this->link->delete();
        $this->dispatch('link-deleted')->to(MyLinks::class);
    }
}

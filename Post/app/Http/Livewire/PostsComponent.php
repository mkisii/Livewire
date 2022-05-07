<?php

namespace App\Http\Livewire;

use Livewire\Component;

class PostsComponent extends Component
{
    public function render()
    {
        
        return view('livewire.posts-component')->layout('livewire.layouts.base');
    }
}

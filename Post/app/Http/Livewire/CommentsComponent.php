<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Comment;

class CommentsComponent extends Component
{
    public $text;
    public $post_id;

    public function addComment($id)
    {
        $comment = new Comment();
        $comment->text = $this->text;
        $comment->post_id = $id;
        $comment->user_id = auth()->user()->id;
    
        $comment->save();
    }
    
    public function render()
    {
        return view('livewire.comments-component')->layout('layouts.app');
    }
}

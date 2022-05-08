<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Queue\Listener;

class PostsComponent extends Component
{
    public $title;
    public $description;
    // public $post_id;
    


    protected $listeners = [

        'refreshParent' => '$refresh'
        ];

    public function storePostData() 
    {
        // $this->validate([
        //     'title' => 'required',
        //     'description' =>'required',
            
        // ]);

    
        $post = new Post();
        $post->title = $this->title;
        $post->description = $this->description;
        $post->user_id = auth()->user()->id;
        
        $post->save();     

        session()->flash('message', 'New Post has been Added Successfully');

        $this->emit('refreshParent');

        $this->dispatchBrowserEvent('close-modal');
        $this->cleanAll();
    }

    private function cleanAll() 
    
    {
        $this->title = null;
        $this->description=null;
    }


    public function updatePost($id) 
    {

     
        $post = Post::where('id', $id)->first();
         
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->description = $post->description; 

        dd($post);

    }


    public function updatePostData($id) 
    {
        $this->validate([
            'title' => 'required',
            'description' =>'required',
            'post_id' => 'required'
            
        ]);
        $post =Post::where('id', $this->post_id)->first();
    }

    public function deletePost($id)
    {
        $post = Post::where('id', $id);
    }



    
    public function render()
    {
        $posts = Post::all();

        
        return view('livewire.posts-component', ['posts'=>$posts])->layout('layouts.app');
    }
}

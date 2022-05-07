<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Queue\Listener;
use Livewire\WithPagination;

class Posts extends Component

{
    use WithPagination;

    public $selectPost;
    public $action;
   
   



    protected $listeners = [
        
        'refreshParent' => '$refresh'
    ];

    

    public function selectPost($postId, $action)
    {
        $this->selectPost = $postId;
       

        if( $action == 'delete') {

            $this->dispatchBrowserEvent('openDeleteModal');

        } else {
            
        }

    }

    public function delete()
    {

        Post::destroy($this->selectPost);

        $this->dispatchBrowserEvent('closeDeleteModal');

    }

    public function render()
    {
        return view('livewire.posts', [

            'posts'=> Post::where(

                'user_id', '=', auth()->user()->id)->paginate(5),

            
        ]);
    }

}

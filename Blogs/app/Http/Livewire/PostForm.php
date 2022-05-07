<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class PostForm extends Component
{
    public $title;
    public $description;

    public function hydrate()
    {
        // $this->validate([

        //     'title'=>'required',
            
        //     'description' => 'required'
        // ]);
    }



    public function save(){

        $data = [
            'title'=> $this->title,
            'description'=>$this->description,
            'user_id' => auth()->user()->id
        ];

        Post::create($data); //creating the form and posting to DB
        $this->emit('refreshParent');
        $this->dispatchBrowserEvent("closeModal");
        $this->cleanAll();

    }

    private function cleanAll() //cleaning the form field after entry function
    {
        $this->title = null;
        $this->description = null;
    }

    public function render()
    {
        return view('livewire.post-form');
    }
    


}

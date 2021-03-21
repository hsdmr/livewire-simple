<?php

namespace App\Http\Livewire;

use App\Models\Category;
use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Main extends Component
{
    public $inputSearch;
    public $inputSelect = 0;
    public $posts;
    public $categories;

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        if($this->inputSelect==0){
            $this->posts = Post::where('title','like','%'.$this->inputSearch.'%')->get();
        }
        else{
            $this->posts = Category::find($this->inputSelect)->posts()->where('title','like','%'.$this->inputSearch.'%')->get();
        }
        return view('livewire.main');
    }
}

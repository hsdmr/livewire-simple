<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class Main extends Component
{
    public $inputSearch;
    public $inputSelect;
    public $posts;
    public $categories;

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }

    public function render()
    {
        $this->posts = Post::where('title','like','%'.$this->inputSearch.'%')->get();
        return view('livewire.main');
    }
}

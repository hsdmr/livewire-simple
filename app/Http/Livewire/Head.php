<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Head extends Component
{
    public function back(){
        return redirect()->route('admin');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
    public function render()
    {
        return view('livewire.head');
    }
}

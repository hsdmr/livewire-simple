<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $inputUsername = 'admin';
    public $inputPassword = 12345678;
    public $message;

    protected $rules = [
        'inputUsername' => 'required',
        'inputPassword' => 'required|min:8',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $credentials = [
            'username' => $this->inputUsername,
            'password' => $this->inputPassword
        ];
        if(Auth::attempt($credentials)){
            if(Auth::user()->role=='main') return redirect()->route('main');
            if(Auth::user()->role=='admin') return redirect()->route('admin');
        }
        else {
            $this->message = 'Kullanıcı Girişi Başarısız';
        }
    }

    public function render()
    {
        return view('livewire.login');
    }
}

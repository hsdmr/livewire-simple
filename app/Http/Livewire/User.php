<?php

namespace App\Http\Livewire;

use App\Models\User as ModelsUser;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class User extends Component
{
    public $userId = 0;
    public $userName;
    public $userRole = 'main';
    public $userPassword;
    public $users;

    public function resetInputs(){
        $this->userId = 0;
        $this->userName = '';
        $this->userRole = 'main';
        $this->userPassword = '';
    }

    public function submit(){
        if($this->userId==0){
            $user = ModelsUser::create([
                'username' => $this->userName,
                'role' => $this->userRole,
                'password' => Hash::make($this->userPassword),
            ]);
        }
        else{
            $user = ModelsUser::find($this->userId);
            $user->update([
                'username' => $this->userName,
                'role' => $this->userRole,
                'password' => Hash::make($this->userPassword),
            ]);
        }
        $this->resetInputs();
    }

    public function edit($id){
        $user = ModelsUser::find($id);
        $this->userName = $user->username;
        $this->userRole = $user->role;
        $this->userId = $id;
    }

    public function delete($id){
        ModelsUser::find($id)->delete();
    }

    public function render()
    {
        $this->users = ModelsUser::all();
        return view('livewire.user');
    }
}

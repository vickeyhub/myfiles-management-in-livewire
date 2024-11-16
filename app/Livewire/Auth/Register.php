<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public $name, $email, $password, $confirm_password;
    #[Title('Register')]
    public function register(){
        $validate = $this->validate([
            "name" => 'required|min:2|max:30',
            "email" => 'required|email|unique:users,email',
            "password" => 'required|min:6|max:40|confirmed:confirm_password',

        ]);

        $validate['password'] = Hash::make($validate['password']);

        // dd($validate);
        User::create($validate);
        session()->flash('success', "Account created successfully");

        $this->redirectRoute('login', navigate:true);
    }
    public function render()
    {
        return view('livewire.auth.register');
    }
}

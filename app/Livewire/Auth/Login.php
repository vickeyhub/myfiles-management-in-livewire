<?php

namespace App\Livewire\Auth;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;

class Login extends Component
{
    #[Layout('components.layouts.auth')]
    public $email, $password;
    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login');
    }

    public function login(){
        $payload = $this->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        // dd($payload);
        if(Auth::attempt($payload)){
            session()->regenerate();
            session()->flash('success', 'Logged in Successfully!');

            return $this->redirectRoute('dashboard', navigate:true);

        }
        return $this->addError(
            "email", "The provided credentials do not match with our records."
        );
    }
}

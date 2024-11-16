<?php

namespace App\Livewire\Files;

use Faker\Core\File;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use App\Models\Files;

class AddFile extends Component
{
    use WithFileUploads;
    public $title, $image;
    public function store(){
        $this->validate([
            "title" => "required|min:2|max:191",
            "image" => 'required|image|mimes:png,jpg,svg,webp'
        ]);

        $user = Auth::guard('web')->user();

        $filename = $this->image->store("images_".$user->id);
        Files::create([
            'title' => $this->title,
            'image' => $filename,
            'user_id' => $user->id
        ]);
        session()->flash('success', 'File uploaded successfully');

        $this->redirectRoute('dashboard', navigate:true);
    }
    public function render()
    {
        return view('livewire.files.add-file');
    }
}

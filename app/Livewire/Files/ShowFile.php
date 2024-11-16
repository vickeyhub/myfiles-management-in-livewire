<?php

namespace App\Livewire\Files;

use App\Models\Files;
use Livewire\Component;
// use Livewire\Attributes\Title;

class ShowFile extends Component
{
    public $id;
    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        $data['file'] = Files::find($this->id);
        return view('livewire.files.show-file', $data)->title($data['file']->title);
    }
}

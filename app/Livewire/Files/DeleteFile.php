<?php

namespace App\Livewire\Files;

use App\Models\Files;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DeleteFile extends Component
{
    public $id;

    public function mount($id){
        $this->id = $id;
    }
    public function render()
    {
        return view('livewire.files.delete-file',['id' => $this->id]);
    }

    public function deleteFile() {
        try{
            $file = Files::findOrFail($this->id);
            if($file->user_id != auth()->user()->id){
                session()->flash("error", "Your are not authorised person to delete this file.");
                return $this->redirectRoute('dashboard', navigate:true);

            }

            // Delete file from storage
            Storage::delete($file->image);
            Files::where("id", $this->id)->delete();
            session()->flash("success", "Your file has been deleted successfully.");
            return $this->redirectRoute('dashboard', navigate:true);

        } catch(\Exception $e){
            session()->flash("error", "Something went wrong");
            return $this->redirectRoute('dashboard', navigate:true);
        }
    }
}

<?php

namespace App\Livewire;

use App\Models\Files;
use Livewire\Component;
use Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\WithPagination;


class Dashboard extends Component
{
    use WithPagination;
    #[Title("Dashboard")]
    #[Url]

    public $search = '';
    public function render()
    {
        $user = Auth::guard('web')->user();
        $data['files'] = Files::select("*")
        ->where('user_id', $user->id)
        // ->where('title', 'ilike', '%'.$this->search.'%')
        ->where('title', 'like', '%' . $this->search . '%')
        ->orderBy('id','desc')
        ->paginate(3);
        return view('livewire.dashboard', $data);
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sports;

class SportSearch extends Component
{
    public $search = "";
    public function render()
    {
        return view('livewire.sport-search', [
            'users' => Sports::where('full_name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}

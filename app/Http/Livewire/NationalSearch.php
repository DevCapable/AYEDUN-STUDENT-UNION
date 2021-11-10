<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NationalPresident;

class NationalSearch extends Component
{
    public $search = "";
    public function render()
    {
        return view('livewire.national-search', [
            'users' => NationalPresident::where('full_name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}

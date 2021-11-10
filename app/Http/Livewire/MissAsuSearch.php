<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\MissAsu;

class MissAsuSearch extends Component
{
    public $search = "";
    public function render()
    {
        return view('livewire.miss-asu-search', [
            'users' => MissAsu::where('full_name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}

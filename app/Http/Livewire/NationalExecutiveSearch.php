<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\NationalExecutive;


class NationalExecutiveSearch extends Component
{
    public $search = "";
    public function render()
    {
        return view('livewire.national-executive-search', [
            'users' => NationalExecutive::where('full_name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}

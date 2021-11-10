<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ChapterPresident;

class ChapterSearch extends Component
{
    public $search ="";
    public function render()
    {
        return view('livewire.chapter-search', [
            'users' => ChapterPresident::where('full_name', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}

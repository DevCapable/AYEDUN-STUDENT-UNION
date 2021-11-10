<?php

namespace App\Http\Livewire;

use App\Models\Message;
use App\Models\UserAccount;
use Livewire\Component;

class SearchUser extends Component
{
    public $search = "" ;
    
    public function render()
    {
        return view('livewire.search-user', [
            'users'=> UserAccount::where('fullname','like', '%'. $this->search. '%')->get()
        ]);
    }
}

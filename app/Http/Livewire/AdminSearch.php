<?php

namespace App\Http\Livewire;

use App\Models\UserAccount;
use Livewire\Component;


class AdminSearch extends Component
{

    public $search="";
    public function render()
    {
       
        return view('livewire.admin-search',[
            'users' => UserAccount::where('fullname', 'like', '%' . $this->search . '%')->get()
        ]);
    }
}

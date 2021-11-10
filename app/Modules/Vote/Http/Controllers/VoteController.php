<?php

namespace App\Modules\Vote\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VoteController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Vote::welcome");
    }

    public function index()
    {

        return view("Vote::index");
    }

    public function meeting()
    {
        return view("Vote::meetings");
    }
}

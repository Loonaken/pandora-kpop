<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;



class OutputController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

    }

    public function random(){

        $song = Song::inRandomOrder()->first();

        return view ('user.outputs.random', compact('song'));
    }


}

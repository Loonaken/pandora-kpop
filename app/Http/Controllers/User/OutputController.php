<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Image;
use App\Models\Emotion;
use App\Models\Period;
use App\Models\Group;



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

    public function create(){

        $emotions = Emotion::orderBy('name', 'asc')->get();
        $periods = Period::orderBy('term', 'desc')->get();
        $group_types = Group::select('type')->get();

        return view ('user.outputs.create', compact('emotions','periods','group_types'));
    }

    public function show(Request $request){

        // dd($request);

        $emotion=$request->emotion;
        $period=$request->period;
        $group_type=$request->type;

        

        return view ('user.outputs.show', compact('emotion', 'period', 'group_type'));
    }

}

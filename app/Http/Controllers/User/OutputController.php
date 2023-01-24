<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Image;
use App\Models\Emotion;
use App\Models\Period;
use App\Models\Group;
use Closure;

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


        $request->validate([
            'emotion'=>'nullable',
            'period'=>'nullable',
            'type'=>'nullable',
        ]);

        // 以下の変数にはIdが入る

        $emotion= $request->emotion;
        $period = $request->period;
        $type = $request->type;


        $view_emotion = Emotion::findOrFail($emotion);
        $view_period = Period::findOrFail($emotion);

        $songs = Song::where('emotion_id', $emotion)
        ->where('period_id', $period)
        ->whereHas('group', function($q)use($type){
            $q->where('type', $type);
        })->get();

        if($emotion == null){
            $songs = Song::where('period_id', $period)
            ->whereHas('group', function($q)use($type){
                $q->where('type', $type);
            })->get();
        }
        if($period == null){
            $songs = Song::where('emotion_id', $emotion)
            ->whereHas('group', function($q)use($type){
                $q->where('type', $type);
            })->get();
        }
        if ($type == null){
            $songs = Song::where('emotion_id', $emotion)
            ->where('period_id', $period)
            ->get();
        }
        if($emotion === null && $period === null){
            $songs = Song::whereHas('group', function($q)use($type){
                $q->where('type', $type);
            })->get();
        }
        if($period === null && $type === null){
            $songs = Song::where('emotion_id', $emotion)
            ->get();
        }
        if($type === null && $emotion === null){
            $songs = Song::where('period_id', $period)
            ->get();
        }

        return view ('user.outputs.show', compact('emotion', 'period', 'type', 'songs', 'view_emotion', 'view_period'));
    }

}

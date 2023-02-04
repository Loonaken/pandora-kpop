<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Emotion;
use App\Models\Period;
use App\Models\Group;
use App\Models\Song;

class HashtagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:users');

    }

    public function refer(Request $request){



        $emotions = Emotion::orderBy('name' , 'asc')->get();
        $periods = Period::orderBy('term' , 'desc')->get();
        $groups = Group::AvailableGroupTypes($request->type)
        ->orderBy('name' , 'asc')->get();

        return view ('user.hashtags.refer', compact('emotions', 'periods', 'groups'));

    }

	/*
	出来ること
        - リクエストにお応じた検索キーワードを表示している
	コード説明・やり方
        - それぞれ別のBladeを作成して表示させている
	*/

    public function emotion(Request $request){

        $request_emotion = $request->emotion;

        $emotion = Emotion::findOrFail($request_emotion);
        // クライアントの選択した気分の名前を出力するため


        $songs = Song::where('emotion_id', $request_emotion)
        ->orderBy('name', 'asc')
        ->get();

        return view ('user.hashtags.emotion', compact('songs', 'emotion'));
    }

    public function period(Request $request){

        $request_period = $request->period;

        $period = Period::findOrFail($request_period);

        $songs = Song::where('period_id', $request_period)
        ->get();

        return view ('user.hashtags.period', compact('songs', 'period'));
    }

    public function group(Request $request, $id){

        $request_group = $request->group;

        $group = Group::findOrFail($request_group);

        $songs = Song::where('group_id', $request_group)
        ->orderBy('name', 'asc')
        ->get();

        return view ('user.hashtags.group', compact('songs', 'group'));
    }
}

<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
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

	/*
	出来ること
        - 曲のIdをランダムに取得している
	コード説明・やり方
        -ランダムに取得するため、inRandomOrderとしている
	*/

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


	/*
    MUST
	出来ること
        -気分、年代、アーティスト属性の3つの検索軸で聞きたい曲を絞り込むことができる
	コード説明・やり方
        -$songs.. 曲のDBから値を取得することを考えており、
            かつ検索条件が複雑なためScopeを使用している
            各selectOOの引数にはリクエストの値の有無をチェックしている
        -??? Model/Song Show
	*/


    public function show(Request $request){

        $emotions = Emotion::get();
        $periods = Period::get();
        $types = Group::select('type')->get();

        $songs = Song::selectEmotion($request->emotion ?? '0')
        ->selectPeriod($request->period ?? '0')
        ->selectType($request->type ?? '0')
        ->get();

        // 以下の変数にはIdが入る

        // $request_emotion= $request->emotion;
        // $request_period = $request->period;
        // $request_type = $request->type;


        // $view_emotion = Emotion::findOrFail($request_emotion);
        // $view_period = Period::findOrFail($request_period);

        // $request_emotion_song = Song::selectEmotion($request->emotion ?? '0')->first();
        // $request_period_song = Song::selectPeriod($request->period ?? '0')->first();
        // $request_type_song = Song::selectType($request->type ?? '0')->first();

        // dd($request_emotion_song,$request_period_song,$request_type_song);

        // $songs = Song::where('emotion_id', $emotion)
        // ->where('period_id', $period)
        // ->whereHas('group', function($q)use($type){
        //     $q->where('type', $type);
        // })->get();

        // if($emotion == null){
        //     $songs = Song::where('period_id', $period)
        //     ->whereHas('group', function($q)use($type){
        //         $q->where('type', $type);
        //     })->get();
        // }
        // if($period == null){
        //     $songs = Song::where('emotion_id', $emotion)
        //     ->whereHas('group', function($q)use($type){
        //         $q->where('type', $type);
        //     })->get();
        // }
        // if ($type == null){
        //     $songs = Song::where('emotion_id', $emotion)
        //     ->where('period_id', $period)
        //     ->get();
        // }
        // if($emotion === null && $period === null){
        //     $songs = Song::whereHas('group', function($q)use($type){
        //         $q->where('type', $type);
        //     })->get();
        // }
        // if($period === null && $type === null){
        //     $songs = Song::where('emotion_id', $emotion)
        //     ->get();
        // }
        // if($type === null && $emotion === null){
        //     $songs = Song::where('period_id', $period)
        //     ->get();
        // }

        return view ('user.outputs.show', compact('emotions', 'periods', 'types', 'songs'));
    }



}

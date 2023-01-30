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
        //リクエスト情報取得
        $emotionId = $request->emotion;
        $periodId = $request->period;
        $typeId = $request->type;

        //該当する曲を取得
        $songs = Song::selectEmotion($emotionId)
        ->selectPeriod($periodId)
        ->selectType($typeId)
        ->get();

        //リクエストした条件を取得する
        $emotion = Emotion::findOrFail($emotionId);
        $period = Period::findOrFail($periodId);
        //groupとtypeがよくわからん
        //typeテーブル作って、groupテーブルのtype_idを外部キーにして、紐づけてくれ

        return view ('user.outputs.show', compact('songs',"emotion","period","typeId"));
    }



}

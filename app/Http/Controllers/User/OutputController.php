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
        -$emotionId等..  リクエスト情報取得

        -$songs.. 曲のDBから値を取得することを考えており、
                    かつ検索条件が複雑なためScopeを使用している
                    各selectOOの引数にはリクエストの値の有無をチェックしている
        -??? Model/Song Show

        -catchEmotionName.. Blade側に検索したキーワードを表示させるため,該当する曲の情報を取得している
            - 一番重要な箇所は find()メソッド。
                ユーザーが絞り込みを行わないことを考慮すると、emotionIdはnull・notNullの2つが想定される
                findOrFail()であれば、nullの場合エラーが発生して処理が進めなくなる
                一方でfind()であれば、nullの場合はnullを値として返してくれるので、Bladeに処理を回すことができる
                そのためfind()を使用している
	*/
    public function show(Request $request){
        $emotionId = $request->emotion;
        $periodId = $request->period;
        $typeId = $request->type;

        $songs = Song::selectEmotion($emotionId ?? null)
        ->selectPeriod($periodId ?? null)
        ->selectType($typeId ?? null)
        ->get();

        $catchEmotionName = Emotion::find($emotionId);
        $catchPeriodTerm = Period::find($periodId);

        return view ('user.outputs.show', compact('songs','catchEmotionName','catchPeriodTerm','typeId'));
    }



}

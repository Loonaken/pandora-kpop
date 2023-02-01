<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emotion;
use App\Models\Song;
use Illuminate\Http\Request;

use App\Http\Requests\EmotionRequest;


class EmotionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }


    public function index()
    {
        $emotions = Emotion::orderBy('updated_at', 'desc')->get();

        return view ('admin.emotions.index', compact('emotions'));
    }

	/*
    MUST_Strength
	出来ること
        -タグの複数登録画面表示
        - ??? CreateBlade SHOW
	*/
    public function create()
    {
        $emotions = Emotion::select('id', 'name')->get();

        return view ('admin.emotions.create', compact('emotions'));

    }

	/*
    MUST
	出来ること
        - 気分タグの複数追加
    引数
        - RequestClassを別に作成している
        - ??? EmotionRequest SHOW
	コード説明・やり方
        -
        - foreach.. addMoreInputFieldsという共通のinput名で$valueをEmotion DBに登録している
	*/

    public function store(EmotionRequest $request)
    {
        foreach($request->addMoreInputFields as $key =>$value){
            Emotion::create($value);
        }

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=> '登録が完了しました。' , 'status'=>'info']);
    }

    public function show($id)
    {
        $emotion = Emotion::findOrFail($id);

        $songs = Song::where('emotion_id', $emotion->id)->get();

        return view ('admin.emotions.show', compact('emotion', 'songs'));

    }

    public function name_edit($id)
    {
        $emotion = Emotion::findOrFail($id);

        $songs = Song::where('emotion_id', $emotion->id)->get();

        return view ('admin.emotions.name_edit', compact('emotion', 'songs'));
    }

	/*
    MUST+TitleDemonstration
	出来ること
        - 気分タグの名前の変更
    引数
        - EmotionRequestを使用していない理由として
            複数のValidationのみが可能であ理、気分タグ名を編集する際である単数Validationは
            対応していないので、name_updateの際は別でルールを定義している
	*/
    public function name_update(Request $request, $id)
    {

        $request->validate([
            'name' => 'nullable|string|max:15|unique:emotions,name',
            // 'sort_order' =>  'nullable|integer',
        ]);

        $emotion = Emotion::findOrFail($id);

        $emotion->name = $request->name;
        // $emotion->sort_order = $request->sort_order;

        $emotion->save();

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

	/*
    MUST
	出来ること
        - 現在の気分タグに曲を登録する
	コード説明・やり方
        - $songs.. 特定の気分タグに登録されていない曲を全て取得するため、
        whereNotIn,orWhereNullを使用して取得している
	*/
    public function song_add($id)
    {
        $emotion = Emotion::findOrFail($id);

        $songs = Song::whereNotIn('emotion_id' , [$emotion->id])
        ->orWhereNull('emotion_id')
        ->get();

        return view('admin.emotions.song_add', compact('emotion', 'songs'));
    }

	/*
    MUST
	出来ること
        - 複数の曲の気分タグを変更することができる
	コード説明・やり方
        - foreach.. リクエストした曲(変更したい曲)のId(song_id)を曲DBから探し、
            既存の曲のemotionカラムに現在の気分タグのページId(emotion_id)を代入して保存する処理
	*/

    public function song_store(Request $request, $id)
    {
        $request->validate([
            'song_ids' => 'required',
        ]);

        $song_ids = $request->song_ids;

        // リクエストで選択された曲の年代タグを該当の年代タグに差し替える
        foreach ($song_ids as $song_id) {
            $song = Song::findOrFail($song_id);
            $song->emotion_id = $id;//$idは現在選択中のperiodのid
            $song->save();
        }

        return redirect()
        ->route('admin.emotions.show', ['emotion'=>$id])
        ->with(['message'=> '曲を追加しました。' , 'status'=>'info']);

    }

	/*
	出来ること
        - 現在の気分タグページに登録されている曲の「気分Id」をNull化している
	*/

    public function song_destroy($id)
    // 気分タグに登録されている曲の「気分Id」を1つずつnullにする
    {
        $song = Song::findOrFail($id);
        $emotion = Emotion::findOrFail($id);

        $song->emotion_id = null;
        $song->save();

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=> '曲の気分タグを削除しました。' , 'status'=>'error']);
    }

	/*
    MUST
	出来ること
        - 気分タグに登録されている「全て」の曲の「気分Id」をnull化する
	コード説明・やり方
        - $songInEmotion.. 曲のEmotion_idを探し~foreachで一つずつNull化して保存している
        ^ $emotion->delete 曲のEmotion_idのNull化の後に気分タグ情報を削除している
	*/

    public function destroy($id)

    {
        $emotion = Emotion::findOrFail($id);
        $songsInEmotion = Song::where('emotion_id', $emotion->id)->get();

        foreach($songsInEmotion as $songInEmotion){
            $songInEmotion->emotion_id = null;
            $songInEmotion->save();
        }
        $emotion->delete();

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=>'気分タグを削除しました。' , 'status'=>'info']);
        }
}

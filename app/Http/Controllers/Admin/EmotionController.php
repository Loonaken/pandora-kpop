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
        $emotions = Emotion::orderByDesc('updated_at')->get();

        return view ('admin.emotions.index', compact('emotions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $emotions = Emotion::select('id', 'name')->get();

        return view ('admin.emotions.create', compact('emotions'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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


        // dd(empty($songs->toArray()));

        return view ('admin.emotions.name_edit', compact('emotion', 'songs'));
    }

    public function name_update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:15|unique:emotions,name',
            'sort_order' =>  'nullable|integer',
        ]);

        $emotion = Emotion::findOrFail($id);

        $emotion->name = $request->name;
        $emotion->sort_order = $request->sort_order;

        $emotion->save();

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

    public function song_add($id)
    {
        $emotion = Emotion::findOrFail($id);

        // 特定の年代タグに登録されていない曲を全て取得するため、
        // whereNotIn,orWhereNullを使用して取得している
        $songs = Song::whereNotIn('emotion_id' , [$emotion->id])
        ->orWhereNull('emotion_id')
        ->get();

        return view('admin.emotions.song_add', compact('emotion', 'songs'));
    }


    public function song_store(Request $request, $id)
    {
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


    public function song_destroy($id)
    // 年代タグに登録されている曲の「年代Id」を1つずつnullにする
    {
        $song = Song::findOrFail($id);

        $emotion = Emotion::findOrFail($id);

        // 年代タグのIdのみをNull化している
        $song->emotion_id = null;

        $song->save();

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=> '曲の気分タグを削除しました。' , 'status'=>'error']);
    }

    public function destroy($id)
    // 年代タグに登録されている全ての曲の「年代Id」をnullにする
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
        ->with(['message'=>'年代タグを削除しました。' , 'status'=>'info']);
        }
}

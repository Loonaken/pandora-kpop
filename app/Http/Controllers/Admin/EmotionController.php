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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function emotion_name_edit($id)
    {
        $emotion = Emotion::findOrFail($id);

        $songs = Song::where('emotion_id', $emotion->id)->get();


        // dd(empty($songs->toArray()));

        return view ('admin.emotions.name_edit', compact('emotion', 'songs'));
    }

    public function emotion_name_update(EmotionRequest $request, $id)
    {
        $emotion = Emotion::findOrFail($id);

        $emotion->name = $request->name;
        $emotion->sort_order = $request->sort_order;

        $emotion->save();

        return redirect()
        ->route('admin.emotions.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

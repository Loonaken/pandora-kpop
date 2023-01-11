<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Song;
use App\Models\Image;
use App\Models\Emotion;
use App\Models\Period;
use App\Models\Group;
use App\Http\Requests\SongRequest;


class SongController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        $songs = Song::with('image')->orderByDesc('updated_at')->get();

        return view ('admin.songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $songs = Song::select('id', 'name')->get();

        $images  =Image::select('id', 'title', 'filename')->orderByDesc('updated_at')->get();

        $emotions = Emotion::with('song')->get();

        $periods = Period::with('song')->get();

        $groups = Group::with('song')->get();

        return view ('admin.songs.create', compact('songs', 'images', 'emotions', 'periods', 'groups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SongRequest $request)
    {


        Song::create([
            'name'=> $request->name,
            'information'=> $request->information,
            'youtube_link'=> $request->youtube_link,
            'emotion_id'=> $request->emotion,
            'period_id'=> $request->period,
            'group_id'=> $request->group,
            'image_id'=> $request->images
        ]);
        // （左辺＝キー名）＝MG（マイグレーション）ファイルで定めたカラムを挿入
         // （右辺＝値）＝上のページのValidationで定めたカラム名を挿入する



        return redirect()->route('admin.songs.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
    public function edit($id)
    {
        $song = Song::findOrFail($id);

        $images  =Image::select('id', 'title', 'filename')->orderByDesc('updated_at')->get();

        $emotions = Emotion::with('song')->get();

        $periods = Period::with('song')->get();

        $groups = Group::with('song')->get();

        return view('admin.songs.edit', compact('song', 'images' ,'emotions','periods','groups'));
    }

    public function update(SongRequest $request, $id)
    // Requestはvalidation項目が多いので、別でSongRequestファイルにまとめてある
    {

        $song = Song::findOrFail($id);

        $song->name = $request->name;
        $song->information = $request->information;
        $song->youtube_link = $request->youtube_link;
        $song->emotion_id = $request->emotion;
        $song->period_id = $request->period;
        $song->group_id = $request->group;
        $song->image_id = $request->images;

        $song->save();


        return redirect()->route('admin.songs.index');
    }

    public function destroy($id)
    {
        //
    }
}

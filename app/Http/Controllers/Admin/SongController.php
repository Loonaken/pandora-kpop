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
    public function store(Request $request)
    {

        $request ->validate([
            'name'=>'required|string|max:30',
            'information'=>'required|string|max:100',
            'youtube_link'=>'required',
            'emotion'=>'required|exists:emotions,id',
            'period'=>'required|exists:periods,id',
            'group'=>'required|exists:groups,id',
            'images'=>'required|exists:images,id'
        ]);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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

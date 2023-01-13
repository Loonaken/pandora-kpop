<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Emotion;
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

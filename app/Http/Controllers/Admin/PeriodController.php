<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Period;
use App\Http\Requests\PeriodRequest;
use Ramsey\Uuid\Type\Integer;

class PeriodController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        $periods = Period::orderByDesc('term')->get();

        return view ('admin.periods.index', compact('periods'));
    }

    public function create()
    {
        $periods = Period::select('id', 'term')->get();

        return view ('admin.periods.create', compact('periods'));
    }

    public function store(PeriodRequest $request)
    {
        foreach($request->addMoreInputFields as $key =>$value){
            Period::create($value);
        }

        return redirect()
        ->route('admin.periods.index')
        ->with(['message'=> '登録が完了しました。' , 'status'=>'info']);
    }

    public function show($id)
    {
        $period = Period::findOrFail($id);

        $songs = Song::where('period_id', $period->id)->get();

        return view ('admin.periods.show', compact('period', 'songs'));

    }

    public function term_edit($id)
    {
        $period = Period::findOrFail($id);

        $songs = Song::where('period_id', $period->id)->get();

        return view ('admin.periods.term_edit', compact('period', 'songs'));
    }

    public function term_update(Request $request, $id)
    {

        $request->validate([
            'term' => 'required|unique:periods,term|integer',
            'sort_order' =>  'nullable|integer',
        ]);

        $period = Period::findOrFail($id);

        $period->term = $request->term;
        $period->sort_order = $request->sort_order;

        $period->save();

        return redirect()
        ->route('admin.periods.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

    public function song_add($id)
    {
        $period = Period::findOrFail($id);

        $songs = Song::whereNotIn('period_id' , [$period->id])->get();

        return view('admin.periods.song_add', compact('period', 'songs'));
    }


    public function song_store(Request $request, $id)
    {
        $song_ids = $request->song_ids;

        foreach ($song_ids as $song_id) {
            $song = Song::findOrFail($song_id);
            $song->period_id = $id;//$idは現在選択中のperiodのid
            $song->save();
        }

        return redirect()
        ->route('admin.periods.show', ['period'=>$id])
        ->with(['message'=> '曲を追加しました。' , 'status'=>'info']);

    }



    public function destroy($id)
    // 年代タグに登録されている全ての曲の年代タグをnullにする
    {
        //
    }

    public function song_destroy($id)
    // 選択された曲の年代タグを1つずつnullにする
    {
        // $group = Group::findOrFail($id);

        Song::findOrFail($id)->delete();


        return redirect()
        ->route('admin.groups.index')
        ->with(['message'=> '曲を削除しました。' , 'status'=>'error']);
    }
}

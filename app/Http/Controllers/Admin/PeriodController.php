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
            // 'sort_order' =>  'nullable|integer',
        ]);

        $period = Period::findOrFail($id);

        $period->term = $request->term;
        // $period->sort_order = $request->sort_order;

        $period->save();

        return redirect()
        ->route('admin.periods.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

	/*
	コード説明・やり方
        - $songs..  特定の年代タグに登録されていない曲を全て取得するため、
                        whereNotIn,orWhereNullを使用して取得している
	*/
    public function song_add($id)
    {
        $period = Period::findOrFail($id);


        $songs = Song::whereNotIn('period_id' , [$period->id])
        ->orWhereNull('period_id')
        ->get();

        return view('admin.periods.song_add', compact('period', 'songs'));
    }


    public function song_store(Request $request, $id)
    {
        $request->validate([
            'song_ids'=>'required',
        ]);

        $song_ids = $request->song_ids;

        // リクエストで選択された曲の年代タグを該当の年代タグに差し替える
        foreach ($song_ids as $song_id) {
            $song = Song::findOrFail($song_id);
            $song->period_id = $id;//$idは現在選択中のperiodのid
            $song->save();
        }

        return redirect()
        ->route('admin.periods.show', ['period'=>$id])
        ->with(['message'=> '曲を追加しました。' , 'status'=>'info']);

    }

	/*
	出来ること
        - 年代タグに登録されている曲の「年代Id」を1つずつnullにする
	コード説明・やり方
        - L_133 $song..  年代タグのIdのみをNull化している
	*/
    public function song_destroy($id)
    {
        $song = Song::findOrFail($id);

        $song->period_id = null;
        $song->save();

        return redirect()
        ->route('admin.periods.index')
        ->with(['message'=> '曲の年代タグを削除しました。' , 'status'=>'error']);
    }

	/*
	出来ること
        - 年代タグに登録されている全ての曲の「年代Id」をnullにする
	*/
    public function destroy($id)

    {
        $period = Period::findOrFail($id);
        $songsInPeriod = Song::where('period_id', $period->id)->get();

        foreach($songsInPeriod as $songInPeriod){
            $songInPeriod->period_id = null;
            $songInPeriod->save();
        }
        $period->delete();

        return redirect()
        ->route('admin.periods.index')
        ->with(['message'=>'年代タグを削除しました。' , 'status'=>'info']);
        }


}

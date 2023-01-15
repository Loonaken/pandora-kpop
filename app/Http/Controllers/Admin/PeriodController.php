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

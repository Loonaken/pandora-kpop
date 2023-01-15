<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Image;
use App\Http\Requests\GroupRequest;



class GroupController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

    }

    public function index()
    {
        $groups = Group::orderByDesc('updated_at')->get();

        return view ('admin.groups.index', compact('groups'));
    }


    public function create()
    {
        $groups = Group::select('id', 'type', 'sort_order', 'name')->get();

        $images  =Image::select('id', 'title', 'filename')->orderByDesc('updated_at')->get();

        return view ('admin.groups.create', compact('groups', 'images' ));
    }

    public function store(GroupRequest $request)
    {
        Group::create([
            'image_id'=> $request->images,
            'name'=> $request->name,
            'type'=> $request->type,
            'information'=> $request->information,
            'sort_order'=> $request->sort_order,
        ]);

        return redirect()
        ->route('admin.groups.index')
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Song;
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
            'name'=> $request->name,
            'information'=> $request->information,
            'type'=> $request->type,
            'sort_order'=> $request->sort_order,
            'image_id'=> $request->images,
        ]);

        return redirect()
        ->route('admin.groups.index')
        ->with(['message'=> '登録が完了しました。' , 'status'=>'info']);

    }

    public function show($id)
    {
        $group = Group::findOrFail($id);

        $songs = Song::where('group_id', $group->id)->get();

        $images  =Image::select('id', 'title', 'filename')->orderByDesc('updated_at')->get();

        return view('admin.groups.show', compact('group', 'images', 'songs'));

    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);

        $images  =Image::select('id', 'title', 'filename')->orderByDesc('updated_at')->get();

        return view('admin.groups.edit', compact('group', 'images'));
    }

    public function update(GroupRequest $request, $id)
    {
        $group = Group::findOrFail($id);

        $group->name = $request->name;
        $group->information = $request->information;
        $group->type = $request->type;
        $group->sort_order = $request->sort_order;
        $group->image_id = $request->images;

        $group->save();


        return redirect()
        ->route('admin.groups.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

    public function destroy($id)
    {
        $group = Group::findOrFail($id);

        Song::findOrFail($id)->delete();

        return redirect()
        ->route('admin.groups.show', ['group'=>$group->id])
        ->with(['message'=> '曲を削除しました。' , 'status'=>'error']);

    }

    public function song_destroy($id)
    {
        $group = Group::findOrFail($id);

        Song::findOrFail($id)->delete();


        return redirect()
        ->route('admin.groups.index')
        ->with(['message'=> '曲を削除しました。' , 'status'=>'error']);
    }
}

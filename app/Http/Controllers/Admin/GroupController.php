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

    public function index(Request $request)
    {
        $groups = Group::AvailableGroupTypes($request->type)
        ->orderByDesc('updated_at')
        ->get();

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

    public function group_destroy($id)
    // グループ情報を削除する
    {
        $group = Group::findOrFail($id);
        $songsInGroup = Song::where('group_id', $group->id)->get();

        // dd($songsInGroup);
        // 該当する曲がグループに登録されている場合は削除ストップ
        // →$songsInGroupの中にデータが入っている時
        // リダイレクトをして削除できない仕様にし、
        // 曲の削除を先に促すようグループのshowページにてフラッシュメッセージを出す
        if(!empty($songsInGroup->toArray())){
            return redirect()->route('admin.groups.show' , ['group'=>$group->id])
            ->with(['message'=>'登録されている曲を削除したのちにグループ情報を削除してください。' , 'status'=>'error']);
        }


        //該当する曲がグループに全く登録されていない場合は削除を実行
        // →$songsInGroupの中にデータが入っていない時
        if(empty($songsInGroup->toArray())){

            Group::findOrFail($id)->delete();

                return redirect()
                ->route('admin.groups.index')
                ->with(['message'=>'グループ情報を削除しました。' , 'status'=>'info']);
        }
    }

    public function song_destroy($id)
    // グループに登録されている曲の「全ての情報」を1つずつ削除する
    {
        // $group = Group::findOrFail($id);

        Song::findOrFail($id)->delete();


        return redirect()
        ->route('admin.groups.show', ['group'=>$id])
        ->with(['message'=> '曲を削除しました。' , 'status'=>'error']);
    }
}

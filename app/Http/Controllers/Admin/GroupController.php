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

	/*
    MUST_Strength
	出来ること
        - 男性アーティスト、女性アーテイスト別で編集したいグループを
            分けて表示している
    引数
        - リクエストに応じて男性か女性アーティストを選んでいるので、
            リクエストパラメーターを使用している
	コード説明・やり方
        - 条件分岐、FatController防止の理由でコードをScopeにしている
        - ??? /Model/Group SHOW

        -
	*/

    public function index(Request $request)
    {

        $groups = Group::AvailableGroupTypes($request->type)
        ->orderByDesc('updated_at')
        ->get();

        $request_type = $request->type;
        // dd($request_type);

        return view ('admin.groups.index', compact('groups', 'request_type'));
    }


	/*
	出来ること
        - 画像選択も含めた新規登録ページの表示
	*/

    public function create()
    {
        $groups = Group::select('id', 'type', 'name')->get();

        $images  =Image::select('id', 'title', 'path')->orderByDesc('updated_at')->get();

        return view ('admin.groups.create', compact('groups', 'images' ));
    }

    public function store(GroupRequest $request)
    {
        Group::create([
            'name'=> $request->name,
            'information'=> $request->information,
            'type'=> $request->type,
            // 'sort_order'=> $request->sort_order,
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

        $images  =Image::select('id', 'title', 'path')->orderByDesc('updated_at')->get();

        return view('admin.groups.show', compact('group', 'images', 'songs'));

    }

    public function edit($id)
    {
        $group = Group::findOrFail($id);

        $images  =Image::select('id', 'title', 'path')->orderByDesc('updated_at')->get();

        return view('admin.groups.edit', compact('group', 'images'));
    }

    public function update(GroupRequest $request, $id)
    {
        $group = Group::findOrFail($id);

        $group->name = $request->name;
        $group->information = $request->information;
        $group->type = $request->type;
        // $group->sort_order = $request->sort_order;
        $group->image_id = $request->images;

        $group->save();


        return redirect()
        ->route('admin.groups.index')
        ->with(['message'=> '更新が完了しました' , 'status'=>'info']);
    }

	/*
	出来ること
        - グループ情報の削除
        - グループに登録されてある曲の削除を優先する警告を出す
        -
	コード説明・やり方
        - グループに登録されてある曲のデータを取得
        - 1つ目のif.. 該当する曲がグループに登録されている場合は削除ストップ
                        →$songsInGroupの中にデータが入っている時,リダイレクトをして削除できない仕様にし、
                        曲の削除を先に促すようグループのshowページにてフラッシュメッセージを出す
        - 2つ目のif.. 該当する曲がグループに全く登録されていない場合は削除を実行
                        ($songsInGroupの中にデータが入っていない時)
	*/

    public function groupDestroy($id)
    {
        $group = Group::findOrFail($id);
        $songsInGroup = Song::where('group_id', $group->id)->get();

        // dd($songsInGroup);

        if(!empty($songsInGroup->toArray())){
            return redirect()->route('admin.groups.show' , ['group'=>$group->id])
            ->with(['message'=>'登録されている曲を削除したのちにグループ情報を削除してください。' , 'status'=>'error']);
        }

        if(empty($songsInGroup->toArray())){

            Group::findOrFail($id)->delete();

                return redirect()
                ->route('admin.groups.index')
                ->with(['message'=>'グループ情報を削除しました。' , 'status'=>'info']);
        }
    }

	/*
	出来ること
        - グループに登録されている曲の「全てのでデータ」を1つずつ削除する
        - !! Emotion,Periodの場合は曲を削除した際、曲の「気分Id,年代Id」が削除されていた
            この[song _Destroy]は曲の「全てのデータ」を削除する
            そのため、Bladeにてモーダルメッセージで注意を促している
	*/

    public function songDestroy($id)
    {
        Song::findOrFail($id)->delete();

        return redirect()
        ->route('admin.groups.show', ['group'=>$id])
        ->with(['message'=> '曲を削除しました。' , 'status'=>'error']);
    }
}

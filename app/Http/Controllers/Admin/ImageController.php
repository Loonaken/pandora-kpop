<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Song;
use App\Models\Group;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class ImageController extends Controller

/*
出来ること
    -Resource全体(CRUD)
存在理由
    -グループ情報・曲情報の登録の際に使用する
*/

{
    public function __construct()
    {
        $this->middleware('auth:admin');
        // 管理者側のみページにアクセスできる
    }


    /*
    出来ること
        -登録されている画像をタイトルの更新が最新順に並べ、
            かつ画像が大量になった際に20枚ずつページ遷移が可能
    存在理由
        -
    */
    public function index()
    {
        $images = Image::orderBy('updated_at', 'desc')
        ->paginate(20);

        return view ('admin.images.index' , compact('images'));
    }

    /*
    出来ること
        -画像登録画面の表示
    存在理由
        -
    */
    public function create()
    {
        return view ('admin.images.create');
    }


    /*
    MUST
    出来ること
        - 画像保存処理
    引数
        - FαtController回避のため、Requestクラスを別に作成した
        - ??? UploadImageRequest SHOW
    コード説明
        - if..リクエストから受け取ってきた値が殻ではなかった時に処理を回す
            - foreach.. 複数受け取った値をそれぞれforeachで回す
            - $fileNameToStore.. 別フォルダ[ImageService]に画像リサイズ処理を実行している
                - 第一引数の$imageFileは[ImageService]の処理で渡すため
                ??? app/Services/ImageService SHOW


    */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
            $fileNameToStore = ImageService::upload($imageFile);
            // 第二引数に画像を格納したいフォルダ名を選択する
            // ImageServiceファイルにファイル名やリサイズメソッドを記載している
                Image::create([
                    'admin_id' => Auth::id(),
                    'filename' => $fileNameToStore
                ]);
            }
        }

        return redirect()
        ->route('admin.images.index')
        ->with(['message'=> '登録が完了しました。' , 'status'=>'info']);

    }

    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('admin.images.edit', compact('image'));

    }

    /*
    出来ること
        - 画像タイトルの変更のみ
        - 画像ファイルの変更をコードしていない理由
            →ユーザー目線に立った際、変更するのであれば複数枚アップロードが可能である新規追加
                機能を使用する方が早いと踏んだため
    コード説明・やり方
        - $request.. 画像アップロードとは違い、この場面ではタイトルの長さのみの
            validationなので、新規にルールを記載した
            - 19文字の理由としては、タイトルが長すぎるとCSS映りが悪くなるため
    */
    public function update(Request $request, $id)
    {
            $request ->validate([
                'title'=>'string|max:19'
            ]);

        $image = Image::findOrFail($id);
        $image->title = $request->title;
        $image->save();


        return redirect()
        ->route('admin.images.index')
        ->with(['message'=> '更新が完了しました。' , 'status'=>'info']);

    }

	/*
	出来ること
        - 画像ファイルの削除（DB＋MyStorage）
    存在理由
        - 画像を削除する前に曲、グループ情報にその画像が使用されているか、チェックする
            理由として、グループ、曲情報には画像が必要になるため、fileNameのNull化を防ぐために
            存在確認をしている
	コード説明・やり方
        - $filePath.. ファイル場所の値を取得するため
        - $imageInSongs/Groups.. 存在理由で述べたとおり、DBのfileNameに
            削除リクエストを受けた画像が入っていないかチェックする
        - 1つ目のif.. 画像情報がどちらに入っている場合、Destroy処理を停止して
            リダイレクト先で再選択のフラッシュメッセージを出して警告する
        - 2つ目のif.. 画像情報が両方にも入っていない場合、
            最初の処理でDBデータを消去
            次の処理でMyStorageから画像を消去
	*/

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/songs/' . $image->filename;
        $imageInSongs = Song::where('image_id', $image->id)->get();
        $imageInGroups = Group::where('image_id', $image->id)->get();

        if(!empty($imageInSongs->toArray() || $imageInGroups->toArray())){
            return redirect()->route('admin.images.index')
            ->with(['message'=>'登録されている曲の画像ファイル、またはグループの画像ファイルを再選択したのちにこの画像を削除してください。' , 'status'=>'error']);
        }
        if(empty($imageInSongs->toArray() || $imageInGroups->toArray())){

            Image::findOrFail($id)->delete();

            if(Storage::exists($filePath)){
                Storage::delete($filePath);
            }

                return redirect()
                ->route('admin.images.index')
                ->with(['message'=>'画像を削除しました。' , 'status'=>'info']);


    }
    }

}
            // foreach($imageInSongs as $imageInSong){
            //     $imageInSong_id = $imageInSong->image_id;


            //     if ($image->id === $imageInSong_id){
            //         return redirect()
            //         ->route('admin.images.index');
            //     }else{
            //         $imageInSong_id = null;
            //         if (is_null($imageInSong_id) !== $image->id){

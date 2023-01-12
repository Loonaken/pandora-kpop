<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Song;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use InterventionImage;
use App\Http\Requests\UploadImageRequest;
use App\Services\ImageService;

class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');

        // $this->middleware(function ($request, $next) {
        //     $id = $request->route()->parameter('image');
        //     $id = (!is_null($id)){
        //         $imagesAdminId = Image::findOrFail($id)->admin->id;
        //             $imageId = (int)$imagesAdminId;
        //             if($imageId !== Auth::id()){
        //                 abort(404);
        //             }
        //     }
        //     dd($request);

        //     return $next($request);
        // });
    }


    public function index()
    {
        $images = Image::where('admin_id', Auth::id())
        ->orderBy('updated_at', 'desc')
        ->paginate(20);

        // dd($images);
        return view ('admin.images.index' , compact('images'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UploadImageRequest $request)
    {
        $imageFiles = $request->file('files');
        if(!is_null($imageFiles)){
            foreach($imageFiles as $imageFile){
            $fileNameToStore = ImageService::upload($imageFile, 'songs');
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $image = Image::findOrFail($id);

        return view('admin.images.edit', compact('image'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UploadImageRequest $request, $id)
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

    public function destroy($id)
    {
        $image = Image::findOrFail($id);
        $filePath = 'public/songs/' . $image->filename;
        $imageInSongs = Song::where('image_id', $image->id)->get();

        if($imageInSongs){
            $imageInSongs->each(function($song) use($image){
                if($song->image_id === $image->id){
                    return redirect()->route('admin.images.index');
                    // ->with(['message'=>'登録されている曲の画像ファイルを再選択したのちにこの画像を削除してください。' , 'status'=>'error']);
                }
            });
        }

        if(Storage::exists($filePath)){
            Storage::delete($filePath);
                }

            Image::findOrFail($id)->delete();

            return redirect()
            ->route('admin.images.index');
            // ->with(['message'=>'画像を削除しました。' , 'status'=>'info']);

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

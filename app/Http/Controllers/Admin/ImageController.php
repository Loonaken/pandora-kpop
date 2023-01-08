<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
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
        ->get();
        // ->orderBy('updated_at', 'desc');
        // ->paginate(20);

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        $imageFile = $request->image;
        if(!is_null($imageFile) && $imageFile->isValid() ){
            $fileNameToStore = ImageService::upload($imageFile, 'images');
            // 第二引数に画像を格納したいフォルダ名を選択する
            // ImageServiceファイルにファイル名やリサイズメソッドを記載している
        }

        return redirect()->route('admin.images.index');
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

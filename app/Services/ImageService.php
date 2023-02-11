<?php

namespace App\Services;


/*
出来ること
    - Intervention.. 画像リサイズをおこなってくれるパッケージをインストール
    - Storage.. 取り込んだ画像を自分んおストレージに保存する処理を行うため、Storageのファサードを使用する

やり方
    - ターミナルで以下を実行する
      $ php composer.phar require intervention/image
    - config/app > providers に パッケージのクラスを使用するため、登録する
    - config/app > Aliases に 全体でエイリアスを使用するため、登録する
      ???Intervention\Image検索->app.php->SHOW
    - namespace下にInterventionImageをuseする
*/

use InterventionImage;
use Illuminate\Support\Facades\Storage;

/*
出来ること
    - 画像アップロード処理
引数
    - $imageFile = ImageControllerで記述されたリクエストで受け取った画像ファイル
コード説明・やり方
    - if.. 単数の画像アップロードではなく、複数の画像アップロードが想定され、
        連想配列で渡ってくるので、形式を整形するために[is_array()]で
        配列でもそうでなくても[file]という変数名に置く

    - $fileName.. 後ほどStorage::put()でファイル名を指定する必要があるため、
        $fileName 作成を定義する必要がある
        ファイル名が被らないようにuniqid()でランダムな数字を生成する
    - $extension.. ファイル名の後に拡張子をつなげる必要があるため
        受け取ったファイルにextension()をつける
    - $fileNameToStore.. ファイル名と拡張子をつなげるために間に
        [.]をつけて一つの変数にする
    - $resizedImage.. InterventionImageの引数にリサイズしたい画像を渡し、
        その後にリサイズしたい縦横比を設定し、データを整えるためにencodeを行う
          encode_参考資料-> https://www.sejuku.net/blog/25909
    - Storage::.. 格納するフォルダを作成してくれる機能であるため、そのためにファイル名を引数に渡す
        public/songs フォルダからファイル名の情報は第一引数
        リサイズした画像を第二引数に渡す
    - 戻り値はImage::createでファイル名を保存する必要があるため、ここで渡している

    - ファイル
*/

class ImageService
{
  public static function upload($imageFile)
  {
    //これいらない
    // if(is_array($imageFile))
    // {
    //   $file = $imageFile['image'];
    // }else{
    //   $file = $imageFile;
    // }

    $fileName = uniqid(rand().'_');
    $extension = $imageFile->extension();
    $fileNameToStore = $fileName. '.' . $extension;
    $resizedImage = InterventionImage::make($imageFile)->resize(1920, 1080)->encode();

    if (app()->isLocal()) {
        // ローカル環境の場合の処理（ローカルストレージに保存）
        $path = Storage::put('public/songs/' . $fileNameToStore, $resizedImage);
    }

    if(app()->environment('production')) {
        // 本番環境の場合の処理(s3に保存)
        $path = Storage::disk('s3')->put('public/songs/' . $fileNameToStore, $resizedImage);
    }

    return $path;
  }
}

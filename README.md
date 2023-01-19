
## インストール方法
```
git clone https://github.com/Loonaken/pandora-kpop.git

cd pandora-kpop

docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

```

- .env.example をコピーして .envファイルを作成


```
cp .env.example .env
```

## sailのエイリアスを登録

~/.zshrcに下記を追記

```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

## sailを起動
```
sail up -d
```
## アプリケーションキーの生成

```
sail artisan key:generate
```

## データベースのマイグレーション(試用)
データベースと連携できるか確認する

```
sail artisan migrate
```


## 画像のインストール

- storage/public/ のフォルダの配下に
```
songs
```
というフォルダ名を新規作成する

- admin側にて画像管理をページに遷移し、新規登録していくつか画像を取り込む(jpeg,jpg,pngのみ)
画像ファイルは取り込み時に渡します。

- app/database/seeders/imageSeeder.php/ のフォルダ内にて
前の工程で取り込んだファイル名をimageSeederに登録します。

## Seeder操作

- app/database/seeders/ 内における、GroupSeeder,SongSeeder,PeriodSeeder,EmotionSeederをそれぞれ登録する
（GroupSeeder,SongSeederは前の工程で登録した、Imageのランダムidを指定する）



## データベースの再マイグレーション
```
sail artisan migrate:refresh --seed

```

## フロントエンドのビルド
```
sail npm install
sail npm run dev
```

これで

http://localhost

にアクセスして、表示確認してください。


## 注意事項

Imageを削除したのちに、
```
sail artisan migrate:refresh --seed
```
を実行して画像管理の画面を表示した際、
画像が正しく表示されないエラーが発生します。

エラー解決方法
- 画像を再度新規登録
- Storageに保存されたfilenameをImageSeederのfilenameのカラムに入れる
-
```
sail artisan migrate:refresh --seed
```


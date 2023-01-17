## Gitのワークフロー

- 基本的にdevelopで開発を進めていく。
- デプロイ時、mainにマージする
- 新規機能開発の時にローカルの- - - developを最新にしてからfeatureブランチを切って開発を進める
- featureブランチの規則はfeature/issue番号
- バグの修正の時はdevelopからhotfixブランチを切って開発を進める
- hotfixブランチの規則はhotfix/issue番号


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
（GroupSeeder,SongSeederは前の工程で登録した、）


-

## データベースのマイグレーション
```
sail artisan migrate
sail artisan migrate:fresh --seed

```

## フロントエンドのビルド
```
sail npm install
sail npm run dev
```

これで

http://localhost

にアクセスして、表示確認してください。

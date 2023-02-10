
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


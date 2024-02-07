
## インストール方法
```
git clone https://github.com/Loonaken/pandora-kpop.git

cd pandora-kpop

composer update
```

## .envをもらう

```
cp .env.example .env
```

```
Delete
-  APP_NAME=Laravel
-  DB_HOST=127.0.0.1
-  DB_PASSWORD=

Add
+  APP_NAME="pandora_kpop"
+  DB_HOST=mysql
+  DB_PASSWORD=root  

```

## docker-compose.ymlファイルの変更

```
laravel.test:
        build:
            context: ./vendor/laravel/sail/runtimes/**8.2**
            dockerfile: Dockerfile
            args:
                WWWGROUP: '${WWWGROUP}'
        image: sail-**8.2**/app
        extra_hosts:
            - 'host.docker.internal:host-gateway'
        ports:
            - '${APP_PORT:-**82**}:**82**'
            - '${VITE_PORT:-**5176**}:${VITE_PORT:-**5176**}'
```

```
 phpmyadmin:
        image: phpmyadmin/phpmyadmin
        links:
            - mysql:mysql
        ports:
            - **8082:82**
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

## シンボリックリンクの作成
```
sail artisan storage:link
```

## データベースのマイグレーション＋シードデータの挿入
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

## phpmyadminの起動
http://localhost:8080

id, passwordは .envのDB_USERNAME, DB_PASSWORDを使ってください。

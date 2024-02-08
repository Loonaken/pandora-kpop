
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


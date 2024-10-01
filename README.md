# Atte4(勤怠管理システム)

勤怠管理システムを作成しました。
ログイン後、ボタン押下で勤務開始と勤務終了、休憩開始と休憩終了時間を管理します。
![トップ画面の画像](<スクリーンショット 2024-09-25 21.01.43.png>)

## 作成目的
模擬案件を通して実戦に近い開発経験を積む

## アプリケーションURL
- 開発環境：http://localhost/
- phpMyAdmin:：http://localhost:8080/

## 機能一覧
- ログイン機能
- ログアウト機能
- 勤怠登録機能
- 日付別勤怠一覧
- ユーザー一覧

## 使用技術（実行環境）
- laravel 8.83.27
- mysql 10.3.39
- php 7.4.9

## テーブル設計
![alt text](<スクリーンショット 2024-10-01 23.45.14.png>)

## ER図
![alt text](<スクリーンショット 2024-10-01 23.46.08.png>)

## 環境開発
**Dockerビルド**
1. `git clone git@github.com:samemaru1540/Atte4.git`
2. DockerDesktopアプリを立ち上げる
3. `docker-compose up -d --build`

**laravelの環境構築**
1. `docker-compose exec php bash`
2. `composer install`
3. 新しく.envファイルを作成
4. .envに以下の環境変数を追加
``` text
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=laravel_user
DB_PASSWORD=laravel_pass
```

5. アプリケーションキーの作成
``` bash
php artisan key:generate
```

6. マイグレーションの実行
``` bash
php artisan migrate
```

7. シーディングの実行
``` bash
php artisan db:seed
```

## アカウントの種類
ダミーアカウント
- テスト太郎からテスト二重郎までの計20個のアカウント

ログイン、テスト用アカウント
- ログインユーザー
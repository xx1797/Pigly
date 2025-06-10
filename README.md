# PiGLy（体重管理アプリ）

## 環境構築

以下のコマンドを順に実行することで、ローカル開発環境が立ち上がります。


### 1. Dockerコンテナをビルドして起動
docker compose up -d --build

### 2. Laravelコンテナに入る
docker compose exec php bash

### 3. Composerで依存パッケージをインストール（初回のみ）
composer install

### 4. .envを用意し、アプリキーを生成
cp .env.example .env
php artisan key:generate

### 5. マイグレーションとシーディング（初期データ登録）
php artisan migrate --seed

## 使用技術（実行環境）
Laravel 10.x

PHP 8.2

MySQL 8.0

Docker / Docker Compose

Laravel Fortify（認証）

Laravel-lang（バリデーションメッセージの日本語対応）

phpMyAdmin（DB確認用）

開発環境：WSL2（Ubuntu） + VSCode

## ER図
![スクリーンショット 2025-06-10 170718](https://github.com/user-attachments/assets/1661b3b5-5215-406c-8a77-15cbd9745af5)



## URL（ローカル開発）
アプリ: http://localhost:8000

phpMyAdmin: http://localhost:8080

ログイン情報：laravel_user / laravel_pass

## テストユーザー情報（初期データ）
メールアドレス	パスワード
test@example.com	Test1234

※ /register/step1 から自分で会員登録も可能です。

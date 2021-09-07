# 【Laravel】TODOリスト

## 課題の対象の方
秀和システム「PHPフレームワーク・Laravel入門」のChapter.1〜Chapter.5を学習済みの方を対象にしています。

## 動作環境
PHP 7.4、Laravel 6、SQLite 3で動作確認しています。

## Laravel 6をインストールする
書籍の学習のために設定したプロジェクトとは別に、新規にLaravelをインストールしましょう。
```
composer create-project "laravel/laravel=6.*" todo --prefer-dist
```
とするといいですね。

## テーブルの作成
テーブル作成は、Laravelのマイグレーションの機能を使ってください。

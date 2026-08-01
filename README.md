# eloquent-app-practice

## 概要

COACHTECH 教材 Tutorial 9-4「Eloquent ORM ハンズオン演習」で作成した成果物です。
（ブログシステムのモデル作成）

## 使用技術

- PHP 8.x
- Laravel 10.x
- Eloquent ORM
- MySQL

## 学んだこと

- モデルとマイグレーションの同時作成　（sail artisan make:model Post -m）
- マイグレーション：テーブル構造の定義
  ->nullable()：NULLを許可する。
- モデルで属性を設定する
  →protectedを使用する。publicでは、例えば$fillable(ホワイトリスト)の設定情報を外部から書き換えられてしまう。privateでは、親子クラス間で設定の継承ができない。
  →$casts：「データベースから取り出した値を、使いやすいデータ型に自動変換する設定」
- コントローラーでCRUD操作
  →public function store(Request $request)
  -- 「投稿を保存する処理（store）を実行するときに、Laravelがブラウザから送られてきたデータをRequestという箱に入れて、その箱を$requestという名前で渡してくれる」
  -- Request $request：「Requestクラスのオブジェクトを$requestという変数で受け取ります」
  →return view('posts.index', ['posts' => $posts]);
  -- コントローラーが$posts（変数）をビュー（blade）のpostsに渡している。

## 動作確認

- http://localhost/posts

## 詰まった所

- バリデーションに引っかかり、contentがエラーになった。

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//「/posts」となっているのは各ファイルがpostsディレクトリ内にあるから
Route::get('/', 'PostController@index');
//ホームページを表示するだけなので('/'だけになるのは当然//
Route::get('/posts/create', 'PostController@create');
//ホームページから新規にブログ投稿作成画面用のファイルを開く//
Route::get('/posts/{post}','PostController@show');
//ホームページから特定のブログ記事を見たいのでIDを指定するのは当然//
Route::get('/posts/{post}/edit','PostController@edit');
//ブログ内容を編集するのでID番号を指定して、編集用画面表示のファイルをGETするのは当然//
Route::post('/posts','PostController@store');
//新規でブログ投稿するためIDがないのは当然//
Route::put('/posts/{post}','PostController@update');
//{post}=IDが渡ってくる//
//IDを指定して情報を更新するので/{post}が必要となる//
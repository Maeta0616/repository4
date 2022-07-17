<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\PostRequest;//PostRequestをuseする

class PostController extends Controller
{
    //post一覧を表示する//
     public function index(Post $post)//index関数に入る前に引数としてPostクラスを$postとしてインスタンス化して渡す//
      {
       return view('index')->with(['posts' => $post->getPaginateByLimit()]);
      }
      public function show(Post $post)
      {
        return view('posts/show')->with(['post'=>$post]);
      }
      public function create()//関数は引数がなくても()が必要
      {
        return view('posts/create');
      }
      public function store(PostRequest $request, Post $post)//PostはDBにアクセスするため//
      //PostRequestクラスはControllerクラスが元々保有しているクラスで$requestでインスタンス化//
      //userからの入力情報を利用するときに必要→Request//
      {
        $input = $request['post'];
        $post->fill($input)->save();//SQLのInsert構文と等しい//
        return redirect('/posts/' . $post->id);//redirect=ユーザーを自動的に指定のURLに誘導するための関数
        
      }
}
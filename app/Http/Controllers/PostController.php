<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
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
  
      public function create(Category $category)
      {
        return view('posts/create')->with(['categories'=>$category->get()]);;
      }
      public function store(PostRequest $request, Post $post)//PostはDBにアクセスするため//
      //PostRequestクラスはControllerクラスが元々保有しているクラスで$requestでインスタンス化//
      //userからの入力情報を利用するときに必要→Request//
      {
        $input = $request['post'];
        $post->fill($input)->save();//SQLのInsert構文と等しい//
        return redirect('/posts/' . $post->id);//redirect=ユーザーを自動的に指定のURLに誘導するための関数
        
      }
      public function edit(Post $post)//関数に引数がなくても（）が必要
      {
        return view('posts/edit')->with(['post'=>$post]);
      }
      public function update(PostRequest $request, Post $post)
      {
        $input_post = $request['post'];
        $post->fill($input_post)->save();

        return redirect('/posts/' . $post->id);
      }
      
      public function destroy(Post $post)
      {
        $post->delete();//SQLでdelete文が削除される
        return redirect('/');
      }
}
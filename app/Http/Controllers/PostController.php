<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    //post一覧を表示する//
    public function index(Post $post)
{
    return $post->get();
}
}

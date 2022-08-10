<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <p class='create'>
            [<a href='/posts/create'>create</a>]
        </p>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                         <a href="/posts/{{ $post->id }}">{{ $post->title }}</a>
                         <form action="/posts/{{ $post->id }}" id="form_{{ $post->id }}" method="post" style="display:inline">
    　　　　　　　　　　　　　　　　　　　　@csrf
   　　　　　　　　　　     　　　　　　　　　　 @method('DELETE')
                            <button type="btn" onclick="return confirm('本当に削除？')">delete</button>
                            </form>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                </div>
                <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
            @endforeach
        </div>
        <div class='paginate'>
            {{$posts->links()}}//←PostControllerのindex関数内で定義されている//
        </div>
    </body>
</html>
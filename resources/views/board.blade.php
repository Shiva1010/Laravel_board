<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaravelBord</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/mystyle.css') }}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('logout') }}">Logout</a>
                    @endauth
                </div>
            @endif
            <div class="content">
                
                @if ( $user_id )
                <div class="title m-b-md">Hi, {{ $user_name }}</div>
                <div class="row">
                <form action="post" method="post">
                    @csrf
                    <a>What's new?</a>
                    <input type="text" id="content" name="content"/>
                    <input type="hidden" name="user_id" value="{{ $user_id }}"/>
                    <input type="hidden" name="user_name" value="{{ $user_name }}"/>
                    <input type="submit" value="Post">
                </form>
                </div>
                @else
                <div class="title m-b-md">Laravel Board</div>
                @endif

                <ul>
                @foreach ($posts as $post)
                <li>
                    <div><a>Name</a> <?= $post->user_name; ?></div>
                    <div><a>Created time</a> <?= substr($post->created_at, 0, strlen($post->created_at)-3); ?></div>
                    <div><a>Content</a> <?= $post->content; ?></div>
                </li>
                @endforeach
                </ul>
            </div>
        </div>
    </body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" >
    <link rel="stylesheet" href="{{ mix('/css/theme.css') }}" >
    <title>Post</title>
</head>
<body>

    <nav class="navbar navbar-expand navbar-warning bg-dark bottom">
        <ul class="nav navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('posts.index')}}">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('posts.create')}}">new post</a>
            </li>
        </ul>
    </nav>

    @if (session()->has('status'))
            <h3 style="color: rgb(48, 0, 241)">
                {{ session()->get('status') }}
            </h3> 
    @endif

    <div class="container">
    @yield('content')
    </div>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
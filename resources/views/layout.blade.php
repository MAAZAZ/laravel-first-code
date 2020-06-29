<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}" >
    <title>Document</title>
</head>
<body>

    @if (session()->has('status'))
            <h3 style="color: rgb(48, 0, 241)">
                {{ session()->get('status') }}
            </h3> 
    @endif

    @yield('content')
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>
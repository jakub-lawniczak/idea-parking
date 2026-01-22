<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea parking</title>
</head>
<body>
    <button><a href="{{ route('tasks.index') }}">Idea parking</a></button>
    <h1>@yield('title')</h1>
    <div>
        @yield('content')
    </div>
</body>
</html>

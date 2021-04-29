<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light bg-light shadow-sm mb-5">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('product.index')}}">Продукты</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('product.unavailable_list')}}">Недоступные продукты</a>
            </li>
            <li class="nav-item">
                <a class="navbar-brand" href="{{route('product.deleted_list')}}">Удалённые продукты</a>
            </li>
        </ul>
    </div>
</nav>
@yield('content')
</body>
</html>

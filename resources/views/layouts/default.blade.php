<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title', 'Weibo App') - Laravel 新手入门教程</title>
  @vite(['resources/sass/app.scss'])
</head>
<body>
@include('layouts._header')
<div class="container">
  <div class="offset-md-1 col-md-10">
    @yield('content')
    @include('layouts._footer')
  </div>
</div>
</body>
</html>

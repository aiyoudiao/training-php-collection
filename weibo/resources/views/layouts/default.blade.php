<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Weibo App') - Laraver 新手入门</title>
  <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body>
  @include('layouts._header')
  <div class="container mx-auto mt-4">
    @include('shared._messages')
    @yield('content')
    @include('layouts._footer')
  </div>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Weibo App') - Laraver 新手入门</title>
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
  <nav class="bg-gray-900 text-white">
    <div class="container mx-auto flex justify-between items-center p-4">
      <a class="text-xl font-bold" href="/">Weibo App</a>
      <ul class="flex space-x-4">
        <li><a class="hover:text-gray-300" href="/help">帮助</a></li>
        <li><a class="hover:text-gray-300" href="#">登录</a></li>
      </ul>
    </div>
  </nav>
  <div class="container mx-auto mt-4">
    @yield('content')
  </div>
</body>
</html>

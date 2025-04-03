@extends('layouts.default')
@section('title', '登录')

@section('content')
<div class="mx-auto max-w-lg">
  <div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="bg-gray-100 px-6 py-4 border-b">
      <h5 class="text-lg font-semibold">登录</h5>
    </div>
    <div class="p-6">
      @include('shared._errors')

      <form method="POST" action="{{ route('login') }}">
          {{ csrf_field() }}

          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">邮箱：</label>
            <input type="text" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('email') }}">
          </div>

          <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">密码：</label>
            <input type="password" name="password" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" value="{{ old('password') }}">
          </div>
          <div class="flex items-center space-x-2 mb-4">
            <input type="checkbox" id="exampleCheck1" name="remember" class="cursor-pointer w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500">
            <label for="exampleCheck1" class="cursor-pointer text-gray-700">记住我</label>
          </div>

          <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 transition">登录</button>
      </form>

      <hr class="my-6 border-gray-300">

      <p class="text-center text-gray-600">还没账号？<a href="{{ route('signup') }}" class="text-blue-500 hover:underline">现在注册！</a></p>
    </div>
  </div>
</div>
@stop

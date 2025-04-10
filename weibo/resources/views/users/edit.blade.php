@extends('layouts.default')
@section('title', '更新个人资料')

@section('content')
<div class="mx-auto max-w-2xl px-4">
  <div class="bg-white shadow rounded-lg">
    <div class="px-6 py-4 border-b">
      <h5 class="text-lg font-semibold">更新个人资料</h5>
    </div>
    <div class="px-6 py-4">

      @include('shared._errors')

      <div class="flex justify-center mb-6">
        <a href="http://gravatar.com/emails" target="_blank">
          <img src="{{ $user->gravatar('200') }}" alt="{{ $user->name }}" class="rounded-full w-32 h-32 border">
        </a>
      </div>

      <form method="POST" action="{{ route('users.update', $user->id) }}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}

        <div class="mb-4">
          <label for="name" class="block text-gray-700 font-medium mb-1">名称：</label>
          <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $user->name }}">
        </div>

        <div class="mb-4">
          <label for="email" class="block text-gray-700 font-medium mb-1">邮箱：</label>
          <input type="text" name="email" disabled class="w-full px-3 py-2 border border-gray-300 rounded bg-gray-100 cursor-not-allowed" value="{{ $user->email }}">
        </div>

        <div class="mb-4">
          <label for="password" class="block text-gray-700 font-medium mb-1">密码：</label>
          <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('password') }}">
        </div>

        <div class="mb-6">
          <label for="password_confirmation" class="block text-gray-700 font-medium mb-1">确认密码：</label>
          <input type="password" name="password_confirmation" class="w-full px-3 py-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('password_confirmation') }}">
        </div>

        <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded">
          更新
        </button>
      </form>
    </div>
  </div>
</div>
@stop

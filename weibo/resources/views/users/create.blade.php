@extends('layouts.default')
@section('title', '注册')

@section('content')
<div class="flex justify-center">
  <div class="w-full max-w-xl">
    <div class="bg-white shadow-md rounded-lg">
      <div class="bg-gray-100 text-primary p-4 rounded-t-lg border">
        <h5 class="text-lg font-semibold">注册</h5>
      </div>
      <div class="p-6">
        @include('shared._errors')
        <form method="POST" action="{{ route('users.store') }}">
          {{@csrf_field()}}
          <div class="mb-4">
            <label for="name" class="block text-gray-700 font-medium mb-2">名称：</label>
            <input type="text" name="name" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('name') }}">
          </div>

          <div class="mb-4">
            <label for="email" class="block text-gray-700 font-medium mb-2">邮箱：</label>
            <input type="text" name="email" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('email') }}">
          </div>

          <div class="mb-4">
            <label for="password" class="block text-gray-700 font-medium mb-2">密码：</label>
            <input type="password" name="password" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('password') }}">
          </div>

          <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700 font-medium mb-2">确认密码：</label>
            <input type="password" name="password_confirmation" class="mt-1 block w-full p-2.5 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ old('password_confirmation') }}">
          </div>

          <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500">
            注册
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
@stop

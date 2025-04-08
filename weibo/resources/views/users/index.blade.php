@extends('layouts.default')
@section('title', '所有用户')

@section('content')
<div class="mx-auto max-w-2xl px-4">
  <h2 class="text-center text-2xl font-semibold mb-6">所有用户</h2>
  <div class="divide-y border border-gray-200 rounded-lg bg-white">
    @foreach($users as $user)
      @include('users._user')
    @endforeach
  </div>

  <div class="mt-4">
    {!! $users->render() !!}
  </div>
</div>
@stop

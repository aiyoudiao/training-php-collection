@extends('layouts.default')
@section('title', $title)

@section('content')
<div class="mx-auto max-w-2xl px-4">
  <h2 class="mb-6 text-2xl font-semibold text-center">{{ $title }}</h2>

  <div class="divide-y divide-gray-200">
    @foreach ($users as $user)
      <div class="flex items-center py-4 space-x-4">
        <img class="w-8 h-8 rounded-full" src="{{ $user->gravatar() }}" alt="{{ $user->name }}">
        <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">
          {{ $user->name }}
        </a>
      </div>
    @endforeach
  </div>

  <div class="mt-6">
    {!! $users->render() !!}
  </div>
</div>
@stop

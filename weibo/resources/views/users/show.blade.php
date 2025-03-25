@extends('layouts.default')

@section('content')
<div class="flex justify-center">
  <div class="w-full max-w-2xl">
    <div class="w-full">
      <div class="flex justify-center items-center">
        <section>
          @include('shared._user_info', ['user' => $user])
        </section>
      </div>
    </div>
  </div>
</div>
@stop

@extends('layouts.default')

@section('content')
    <div class="flex justify-center">
        <div class="w-full max-w-2xl">
            <div class="w-full">
                <section class="flex justify-center items-center">
                    <div class="text-center">
                        @include('shared._user_info', ['user' => $user])
                    </div>
                </section>

                @if (Auth::check())
                    @include('users._follow_form')
                @endif

                <section class="overflow-auto p-0 mt-2">
                    @include('shared._stats', ['user' => $user])
                </section>
                <hr />
                <section class="space-y-4">
                    @if ($statuses->count() > 0)
                        <ul class="space-y-4">
                            @foreach ($statuses as $status)
                                @include('statuses._status')
                            @endforeach
                        </ul>
                        <div class="mt-6">
                            {!! $statuses->render() !!}
                        </div>
                    @else
                        <p class="text-gray-500 text-center py-4">没有数据！</p>
                    @endif
                </section>
            </div>
        </div>
    </div>
@stop

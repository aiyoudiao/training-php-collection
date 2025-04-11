@extends('layouts.default')
@section('content')
    @if (Auth::check())
        <div class="w-full flex flex-column justify-center items-center">
            <div class="flex flex-col md:flex-row gap-6 w-full max-w-2xl">
                <div class="md:w-2/3 w-full">
                    <section class="status_form">
                        @include('shared._status_form')
                    </section>
                    <h4>微博列表</h4>
                    <hr>
                    @include('shared._feed')
                </div>

                <aside class="md:w-1/3 w-full">
                    <section class="flex flex-col justify-center items-center">
                        @include('shared._user_info', ['user' => Auth::user()])
                    </section>
                </aside>
            </div>
        </div>
    @else
        <div class="flex justify-center">
            <div class="bg-gray-100 p-8 py-[6rem] rounded-lg text-left w-full max-w-2xl">
                <h1 class="text-4xl font-bold text-gray-900">Hello Laravel</h1>
                <p class="text-lg text-gray-700 mt-4">
                    你现在所看到的是
                    <a href="https://learnku.com/courses/laravel-essential-training" class="text-blue-600 hover:underline">
                        Laravel 入门教程
                    </a>
                    的示例项目主页。
                </p>
                <p class="text-gray-600 mt-2">一切，将从这里开始。</p>
                @if (!Auth::check())
                    <p class="mt-6">
                        <a href="{{ route('signup') }}"
                            class="bg-green-500 text-white text-lg px-6 py-3 rounded-lg shadow-md hover:bg-green-600 transition">
                            现在注册
                        </a>
                    </p>
                @endif
            </div>
        </div>
    @endif

@stop

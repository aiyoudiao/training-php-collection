@extends('layouts.default')
@section('title', '重置密码')

@section('content')
    <div class="max-w-xl mx-auto px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 text-primary px-6 py-4 border-b rounded-t-lg">
                <h5 class="text-lg font-semibold">重置密码</h5>
            </div>

            <div class="p-6">
                @if (session('status'))
                    <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-200 rounded">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">邮箱地址：</label>
                        <input id="email" type="email" name="email" value="{{ old('email') }}"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('email') ? 'border-red-500' : '' }}"
                            required>

                        @if ($errors->has('email'))
                            <p class="text-sm text-red-600 mt-1">
                                <strong>{{ $errors->first('email') }}</strong>
                            </p>
                        @endif
                    </div>

                    <div>
                        <button type="submit"
                            class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition">
                            发送密码重置邮件
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

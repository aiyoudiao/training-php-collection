@extends('layouts.default')
@section('title', '更新密码')

@section('content')
    <div class="max-w-xl mx-auto px-4">
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <div class="bg-gray-100 text-primary px-6 py-4 border-b rounded-t-lg">
                <h5 class="text-lg font-semibold">更新密码</h5>
            </div>

            <div class="p-6">
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    {{-- Email --}}
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Email 地址</label>
                        <input id="email" type="email"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('email') ? 'border-red-500' : 'border-gray-300' }}"
                            name="email" value="{{ $email ?? old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <p class="text-sm text-red-600 mt-1">
                                <strong>{{ $errors->first('email') }}</strong>
                            </p>
                        @endif
                    </div>

                    {{-- Password --}}
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-medium mb-2">密码</label>
                        <input id="password" type="password"
                            class="w-full border rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500 {{ $errors->has('password') ? 'border-red-500' : 'border-gray-300' }}"
                            name="password" required>
                        @if ($errors->has('password'))
                            <p class="text-sm text-red-600 mt-1">
                                <strong>{{ $errors->first('password') }}</strong>
                            </p>
                        @endif
                    </div>

                    {{-- Confirm Password --}}
                    <div class="mb-4">
                        <label for="password-confirm" class="block text-gray-700 font-medium mb-2">确认密码</label>
                        <input id="password-confirm" type="password"
                            class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
                            name="password_confirmation" required>
                    </div>

                    {{-- Submit --}}
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full bg-blue-500 hover:bg-blue-600 text-white font-medium py-2 px-4 rounded transition">
                            重置密码
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

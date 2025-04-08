<!-- Navbar -->
<nav class="bg-gray-900 text-white">
    <div class="container mx-auto flex justify-between items-center p-4">
        <a class="text-xl font-bold" href="{{ route('home') }}">Weibo App</a>
        <ul class="flex items-center space-x-4">
            @if (Auth::check())
                <li><a class="hover:text-gray-300" href="#">用户列表</a></li>

                <li class="relative group">
                    <button class="hover:text-gray-300 focus:outline-none">
                        {{ Auth::user()->name }}
                    </button>
                    <div class="absolute right-0 mt-0 w-48 bg-white text-gray-900 shadow-lg rounded-lg hidden overflow-hidden group-hover:block">
                        <a class="block px-4 py-2 hover:bg-gray-200" href="{{ route('users.show', Auth::user()) }}">个人中心</a>
                        <a class="block px-4 py-2 hover:bg-gray-200" href="{{ route('users.edit', Auth::user())}}">编辑资料</a>
                        <div class="border-t border-gray-200"></div>
                        <form action="{{ route('logout') }}" method="POST" class="block">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="w-full text-left px-4 py-2 text-red-600 hover:bg-gray-200"
                                type="submit">退出</button>
                        </form>
                    </div>
                </li>
            @else
                <li><a class="hover:text-gray-300" href="{{ route('help') }}">帮助</a></li>
                <li><a class="hover:text-gray-300" href="{{ route('login') }}">登录</a></li>
            @endif
        </ul>
    </div>
</nav>

@can('follow', $user)
    <div class="text-center mt-2 mb-4">
        @if (Auth::user()->isFollowing($user->id))
            <form action="{{ route('followers.destroy', $user->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit"
                    class="px-4 py-1 text-sm text-blue-600 border border-blue-600 rounded hover:bg-blue-600 hover:text-white transition">
                    取消关注
                </button>
            </form>
        @else
            <form action="{{ route('followers.store', $user->id) }}" method="post">
                @csrf
                <button type="submit" class="px-4 py-1 text-sm text-white bg-blue-600 rounded hover:bg-blue-700 transition">
                    关注
                </button>
            </form>
        @endif
    </div>
@endcan

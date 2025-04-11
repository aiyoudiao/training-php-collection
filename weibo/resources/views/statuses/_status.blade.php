<li class="flex space-x-4 p-4 border-b border-gray-200  hover:bg-gray-50 rounded cursor-default">
  <a href="{{ route('users.show', $user->id ) }}">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="w-12 h-12 rounded-full object-cover">
  </a>
  <div class="flex-1">
    <h5 class="text-base font-semibold text-gray-800 mb-1">
      {{ $user->name }}
      <small class="text-sm text-gray-500 font-normal"> / {{ $status->created_at->diffForHumans() }}</small>
    </h5>
    <p class="text-gray-700">{{ $status->content }}</p>
  </div>
  @can('destroy', $status)
    <form action="{{route('statuses.destroy', $status->id)}}" method="POST" class="flex items-center" onsubmit="return confirm('您确定要删除本条微博吗？');">
      {{ csrf_field()}}
      {{ method_field('DELETE')}}
      <button type="submit" class="bg-red-600 text-white hover:bg-red-500 rounded px-2 py-1 text-sm">
        删除
      </button>
    </form>
  @endcan
</li>

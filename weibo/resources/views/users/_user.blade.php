<div class="flex items-center justify-between gap-4 px-4 py-3 hover:bg-gray-50 transition">
  <div class="flex items-center gap-4">
    <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="w-8 h-8 rounded-full">
    <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">
      {{ $user->name }}
    </a>
  </div>
  @can('destroy', $user)
    <form action="{{route('users.destroy', $user->id)}}" method="POST">
      {{ csrf_field()}}
      {{ method_field('DELETE')}}
      <button type="submit" class="bg-red-600 text-white hover:bg-red-500 rounded px-2 py-1 text-sm">
        删除
      </button>
    </form>
  @endcan
</div>

<div class="flex items-center gap-4 px-4 py-3 hover:bg-gray-50 transition">
  <img src="{{ $user->gravatar() }}" alt="{{ $user->name }}" class="w-8 h-8 rounded-full">
  <a href="{{ route('users.show', $user) }}" class="text-blue-600 hover:underline">
    {{ $user->name }}
  </a>
</div>

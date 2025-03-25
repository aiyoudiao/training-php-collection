<a href="{{ route('users.show', $user->id) }}" class="inline-block">
  <img src="{{ $user->gravatar('140') }}" alt="{{ $user->name }}" class="w-36 h-36 rounded-full border border-gray-300 shadow-md">
</a>
<h1 class="text-2xl font-bold mt-4 text-center">{{ $user->name }}</h1>

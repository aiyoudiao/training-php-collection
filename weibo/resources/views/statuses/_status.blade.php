<li class="flex space-x-4 py-4 border-b border-gray-200">
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
</li>

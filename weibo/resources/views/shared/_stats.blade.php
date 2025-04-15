<div class="flex mt-2 border-gray-200 divide-x divide-gray-200 mt-0 text-center">
  <a href="{{route('users.followings', $user->id)}}" class="w-1/3 py-2 text-gray-800 hover:text-blue-600 first:border-l-0">
    <div>
      <strong id="following" class="block text-lg font-semibold text-black">
        {{ count($user->followings) }}
      </strong>
      <span>关注</span>
    </div>
  </a>
  <a href="{{route('users.followers', $user->id)}}" class="w-1/3 py-2 text-gray-800 hover:text-blue-600">
    <div>
      <strong id="followers" class="block text-lg font-semibold text-black">
        {{ count($user->followers) }}
      </strong>
      <span>粉丝</span>
    </div>
  </a>
  <a href="{{route('users.show', $user->id)}}" class="w-1/3 py-2 text-gray-800 hover:text-blue-600">
    <div>
      <strong id="statuses" class="block text-lg font-semibold text-black">
        {{ $user->statuses()->count() }}
      </strong>
      <span>微博</span>
    </div>
  </a>
</div>

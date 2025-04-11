@if ($feed_items->count() > 0)
  <ul class="space-y-6">
    @foreach ($feed_items as $status)
      @include('statuses._status', ['user' => $status->user])
    @endforeach
  </ul>
  <div class="mt-8">
    {!! $feed_items->render() !!}
  </div>
@else
  <p class="text-gray-500 text-center mt-8">没有数据！</p>
@endif

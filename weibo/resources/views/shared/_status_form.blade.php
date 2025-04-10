<form action="{{ route('statuses.store') }}" method="POST" class="space-y-4">
  @include('shared._errors')
  {{ csrf_field() }}

  <textarea
    class="w-full rounded-md border border-gray-300 p-3 shadow-sm focus:border-blue-500 focus:outline-0 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
    rows="4"
    placeholder="聊聊新鲜事儿..."
    name="content"
  >{{ old('content') }}</textarea>

  <div class="text-right">
    <button
      type="submit"
      class="inline-block rounded-md bg-blue-500 px-4 py-2 text-white hover:bg-blue-600 transition"
    >
      发布
    </button>
  </div>
</form>

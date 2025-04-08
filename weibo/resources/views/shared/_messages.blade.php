@foreach (['danger', 'warning', 'success', 'info'] as $msg)
  @if(session()->has($msg))
    <div class="w-full flex justify-center">
      <p class="
        w-full max-w-2xl
        @if($msg === 'danger') bg-red-300 text-red-800
        @elseif($msg === 'warning') bg-yellow-300 text-yellow-800
        @elseif($msg === 'success') bg-green-300 text-green-800
        @elseif($msg === 'info') bg-blue-300 text-white
        @endif
        p-4 rounded-lg mb-4">
        {{ session()->get($msg) }}
      </p>
    </div>
  @endif
@endforeach

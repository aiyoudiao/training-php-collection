@if (count($errors) > 0)
    <div class="bg-red-400 text-white p-4 rounded-lg mb-4">
        <ul class="space-y-2">
            @foreach ($errors->all() as $error)
              <li class="text-sm"> ❌ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

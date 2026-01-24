  @props(['key' => '', 'message' => ''])
  
  @if (session('status') === $key)
      <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
          class="w-full bg-green-500 text-white py-2 px-3 my-3 text-center rounded-lg">{{ __($message) }}
      </div>
  @endif

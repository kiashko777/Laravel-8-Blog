@auth
  <x-panel>
    {{--FORM TO CREATE AND SEND THE COMMENTS--}}

    <form method="POST" action="/posts/{{ $post->slug }}/comments"
          class="border border-gray-300 bg-gray-100 p-6 rounded-xl">
      @csrf
      <header class="flex items-center">
        <img src="https://i.pravatar.cc/40?u={{ auth()->id() }}" alt="image" width="40" height="40"
             class="rounded-full border border-blue-300"/>
        <h2 class="ml-4">Leave your comment!</h2>
      </header>

      <div class="mt-6">
    <textarea class="w-full text-sm focus:outline-none focus:ring p-4" name="body" cols="30" rows="5"
              placeholder="Your comment..." required></textarea>
      </div>

      <div class="flex justify-end">
        <button type="submit" class="bg-blue-400 text-white rounded mt-4 py-2 px-4 hover:bg-blue-500">
          Post!
        </button>
      </div>
      @error('body')
      <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
      @enderror
    </form>
  </x-panel>
@else
  <p class="font-semibold">
  <p class="mb-8 font-bold">
    To leave the comments please
    <a href="{{ route('register') }}"
       class="text-xs font-bold underline uppercase hover:bg-blue-500 hover:text-white p-2 rounded">Register</a>
    or
    <a href="{{ route('login') }}"
       class="ml-3 text-xs font-bold underline uppercase hover:bg-blue-500 hover:text-white p-2 rounded">Log
      In</a>
  </p>
@endauth

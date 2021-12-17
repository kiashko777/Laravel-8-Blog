@props(['comment'])

{{--To see published comments--}}

<article class="flex bg-gray-100 border border-gray-200 p-6 rounded-xl space-x-4">
  <div class="flex-shrink-0">
    <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="image" width="60" height="60"
         class="rounded-xl border border-blue-300"/>
  </div>

  <div>
    <header class="mb-2">
      <h3 class="font-bold">{{ $comment->author->username }}</h3>
      <p class="text-xs mt-2">
        Posted
        <time>{{ $comment->created_at->format('F j, Y,g:i a ') }}</time>
      </p>
    </header>
    <hr>
    <p class="mt-2">{{ $comment->body }}</p>
  </div>

</article>

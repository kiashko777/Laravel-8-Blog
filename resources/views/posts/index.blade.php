<x-layout>
  @include('posts._header')

  {{--  IMPLEMENT PAGINATION--}}

  <main class="max-w-6xl mx-auto mt-6 space-y-6 lg:mt-20">
    @if($posts->count())
      <x-posts-grid :posts="$posts"/>
      {{ $posts = \App\Models\Post::paginate(6)->links() }}
    @else
      <p class="text-center">No post found!</p>
    @endif

  </main>

</x-layout>

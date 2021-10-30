<x-layout>
  @include('posts._header')

{{--  IMPLEMENT PAGINATION--}}

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if($posts->count())
      <x-posts-grid :posts="$posts"/>
      {{ $posts = \App\Models\Post::paginate(6)->links() }}
    @else
      <p class="text-center">No post found!</p>
    @endif

  </main>

{{--INITIAL CODE FOR THE FUTURE REFERENCE--}}

  {{--  @foreach($posts as $post)--}}
  {{--    <article>--}}
  {{--      <h1>--}}
  {{--        <a href="/posts/{{ $post->slug }}">--}}
  {{--          {{ $post->title }}--}}
  {{--        </a>--}}
  {{--      </h1>--}}
  {{--      By: <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> | <a--}}
  {{--        href="/categories/{{ $post->category->slug }}">Category: {{ $post->category->name }}</a>--}}
  {{--      <br><br>--}}
  {{--      <div>{{ $post->excerpt }}</div>--}}
  {{--    </article>--}}

  {{--  @endforeach--}}
</x-layout>

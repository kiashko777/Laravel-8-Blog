<x-layout>
  @include('_posts-header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    <x-post-featured-card :post="$posts[0]"/>

    <div class="lg:grid lg:grid-cols-2">
      <x-post-card/>
      <x-post-card/>

    </div>

    <div class="lg:grid lg:grid-cols-3">
      <x-post-card/>
      <x-post-card/>
      <x-post-card/>
    </div>
  </main>


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

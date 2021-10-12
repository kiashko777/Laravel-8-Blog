@extends('layout')

@section('content')
  @foreach($posts as $post)
    <article>
      <h1>
        <a href="/posts/{{ $post->slug }}">
          {{ $post->title }}
        </a>
      </h1>
      <a href="#">Category: {{ $post->category->name }}</a>
      <br><br>
      <div>{{ $post->excerpt }}</div>
    </article>

  @endforeach
@endsection

@extends('components.layout')

@section('content')
  <article>
    <h1>{{ $post->title }}</h1>
    By: <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> | <a
      href="/categories/{{ $post->category->slug }}">Category: {{ $post->category->name }}</a>
    <br><br>
    <div>{!!$post->body!!}</div>
  </article>
  <br>
  <a href="/">Go Back</a>
@endsection

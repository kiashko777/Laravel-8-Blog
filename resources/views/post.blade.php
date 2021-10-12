@extends('layout')

@section('content')
  <article>
    <h1>{{ $post->title }}</h1>
    By <a href="#">{{ $post->user->name }}</a> | <a
      href="/categories/{{ $post->category->slug }}">Category: {{ $post->category->name }}</a>
    <br><br>
    <div>{!!$post->body!!}</div>
  </article>
  <br>
  <a href="/">Go Back</a>
@endsection

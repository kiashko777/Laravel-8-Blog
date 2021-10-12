@extends('layout')

@section('content')
  <article>
    <h1>{{ $post->title }}</h1>
    <a href="#">Category: {{ $post->category->name }}</a>
    <br><br>
    <div>{!!$post->body!!}</div>
  </article>
  <br>
  <a href="/">Go Back</a>
@endsection

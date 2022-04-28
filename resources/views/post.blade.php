@extends('base_layout')

@section('content')
    <article>
        <h1> {{$post->title}}  </h1>
        <p> {!! $post->body !!} </p>
    </article>
    <a href="/">Back</a>
@endsection




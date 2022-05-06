@extends('base_layout')

@section('content')

    @foreach ($posts as $post)
        <article>
            <h1> <a href="posts/{{$post->id}}"> {{$post->title}} </a></h1>
            <h3><a href="categories/{{$post->category->slug}}">{{$post->category->name}}</a> </h3>
            <p>{{$post->excerpt}}</p>
        </article>
    @endforeach


@endsection


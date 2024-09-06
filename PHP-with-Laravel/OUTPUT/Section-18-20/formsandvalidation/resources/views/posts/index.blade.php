@extends('layouts.app')

@section('content')

<ul>
  @foreach($posts as $post)
    </div>

    <li>{{$post->title}} - {{$post->content}} <a href="{{route('posts.show', $post->id)}}">view</a></li>

  @endforeach
</ul>


@endsection

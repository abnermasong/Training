@extends('layouts.app')

@section('content')

<h1><a href="{{route('posts.edit',$posts->id)}}">{{$posts->title}}</a></h1>


@endsection

@extends('layouts.app')

@section('content')

<h1>EDIT PAGE</h1>


<form method="post" action="/posts/{{$posts->id}}">
       
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PUT"> 
    <input type="text" name="title" placeholder="Enter title" value="{{$posts->title}}">
    <input type="submit" name="submit" value="UPDATE">
    
</form> 

<form method="post" action="/posts/{{$posts->id}}">
       
    {{csrf_field()}}
    <input type="hidden" name="_method" value="DELETE"> 
    {{-- <input type="text" name="title" placeholder="Enter title" value="{{$posts->title}}"> --}}
    <input type="submit" name="submit" value="DELETE">
    
</form> 


@endsection

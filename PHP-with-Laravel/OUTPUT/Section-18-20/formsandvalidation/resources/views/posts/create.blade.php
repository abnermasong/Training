@extends('layouts.app')

@section('content')

<h1>CREATE PAGE</h1>


   <form method="post" action="/posts">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit">   
    </form>

    {{-- <form action="/uploadfile" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input type="file" class="form-control-file" name="fileToUpload" id="exampleInputFile">
        </div>
    </form> --}}

@endsection



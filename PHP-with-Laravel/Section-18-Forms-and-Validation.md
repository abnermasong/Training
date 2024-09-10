# Forms and Validation

### Forms 
- This enables users to input their information. These information are then stored to the database.

### Example code:
```php
//web.php
Route::resource('/posts',PostsController::class);
```
```php
//PostsController
 public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
//CREATE
 public function create()
    {
        return view('posts.create');
    }
//STORE
public function store(Request $request)
    {
        Post::create($request->all());
        return redirect('/posts');
    }
//READ
public function show(string $id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.show', compact('posts'));
    }
//EDIT
 public function edit(string $id)
    {
        $posts = Post::findOrFail($id);
        return view('posts.edit', compact('posts'));
    }
//UPDATE
 public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }
//DELETE
public function destroy(string $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('/posts');
    }

```

```blade
{{-- CREATE PAGE --}}
@extends('layouts.app')
@section('content')

<h1>CREATE PAGE</h1>

   <form method="post" action="/posts">
        @csrf
        <input type="text" name="title" placeholder="Enter title">
        <input type="submit" name="submit">   
    </form>

@endsection
```

```blade
{{-- EDIT PAGE & DELETE PAGE--}}
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
    <input type="submit" name="submit" value="DELETE">
</form> 

@endsection
```

```blade
{{-- SHOW PAGE--}}
@extends('layouts.app')
@section('content')

<h1><a href="{{route('posts.edit',$posts->id)}}">{{$posts->title}}</a></h1>

@endsection
```

```blade
{{-- INDEX PAGE--}}
@extends('layouts.app')
@section('content')

<ul>
  @foreach($posts as $post)
    </div>
    <li>{{$post->title}} - {{$post->content}} <a href="{{route('posts.show', $post->id)}}">view</a></li>
  @endforeach
</ul>

@endsection
```
```blade
{{-- MASTER LAYOUT--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AJ TRAINING</title>
</head>
<body>
    
    <div class="container">

    @yield('content');

    </div>

    @yield('footer');
    
</body>
</html>
```

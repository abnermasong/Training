# Views
This is where the front end side of Laravel happens.
- To use Laravel templating system `blade` add `.blade.php` to your view's name.
- To view your desired view, use `return view('view_name')`.
  
## Passing data to views

- By utilizing `compact`, you can access `/post/id/name`.
```php
///...
 public function show_post($id,$name)
    {
        return view('post', compact('id', 'name'));
    }
  //...
}
```
- Instead of using `echo` command, use `{{` and `}}`, e.g `{{ $id }}` to display the variable.
```blade
<h1>
    Post {{$id}} {{$name}}
</h1>
```
#### web.php
```php
Route::get('/post/{id}/{name}', '\App\Http\Controllers\PostController@show_post');
```

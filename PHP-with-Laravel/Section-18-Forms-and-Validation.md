# Forms and Validation

### Forms 
- This enables users to input their information. These information are then stored to the database.

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

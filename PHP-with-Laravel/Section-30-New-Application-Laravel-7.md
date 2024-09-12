# New Application - Laravel 7

## NOTES

### Importing the Provided Project Assets
- Value of `href` to `{{ asset('/css/app.css') }}`
- Asset directory should match in the code and in the file directory.

### Linking Button to View
- ` <a class="navbar-brand" href="{{route('home')}}">HOME</a>`
- `'home'` : Is the name of the `view.blade.php`.

### Migration
- `php artisan make:mode Post --mc` : `m` for `migration`, `c` for `controller`.
- Add tables in your created migration:
```php
 public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('post_image')->nullable();
            $table->text('body');
            $table->timestamps();
        });
    }
```
- Add relationships to `Post` and `User Model`:
```php
//User Model
    public function posts(){        
        return $this->hasMany(Post::class);
    }
```
```php
//Post Model
   protected $guarded = [];
   public function user() {
        return $this->belongsTo('App\Models\User');
    }
```
- Instead of `$fillable`, use `$guarded` so you won't need to add each table category.
- `php artisan migrate` : Dont forget to run the migration. 

### Generating Test Data
- `php artisan make:factory PostFactory --model="Post"` : To create a factory for Post.
- Create a factory for the table of `posts`
```php
use App\Models\User;
 public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence(),
            'post_image' => fake()->imageUrl('900','300'),
            'body' => fake()->paragraph()
        ];
    }
```
- Create a function in `DatabaseSeeder` that generates test data.
```php
use App\Models\User;
use App\Models\Post;
  public function run(): void
      {
          User::factory(10)->create()->each(function($user){
  
              $user->posts()->saveMany(Post::factory(1)->make(['user_id' => $user->id]));
          });
```
- `php artisan db:seed` : To generate test data in the database.

### Displaying Post on Home View
```php
//HomeController
 public function index()
    {
        $posts = Post::all();

        return view('home', ['posts' => $posts]);
    }
```
- Add a `@foreach` to iterate through all the data in the database.
- Change the values you want to display accordingly.
```blade
{{--Blog Post--}}
   @foreach ($posts as $post)
      <div class="card mb-4">
        <img class="card-img-top" src="{{$post->post_image}}" alt="Card image cap">
        <div class="card-body">
          <h2 class="card-title">{{$post->title}}</h2>
          <p class="card-text">{{Str::limit($post->body, '300', '...')}}</p>
          <a href="#" class="btn btn-primary">Read More &rarr;</a>
        </div>
        <div class="card-footer text-muted">
          Posted on {{$post->created_at->diffForHumans()}}
          <a href="#">Start Bootstrap</a>
        </div>
      </div>
      @endforeach

```

### Displaying Individual Post
```php
//web.php
Route::get('/post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post');
```
```php
//PostController
  public function show(Post $post){
        return view('blog-post', ['post' => $post]);
    }
```
```blade
{{--Blog Post -> READ MORE BTN--}}
<a href="{{route('post',$post->id)}}" class="btn btn-primary">Read More &rarr;</a>
```

### Creating a Post from Admin
- From the `admin-master` take a section you want to modify into a Create Option.
- Create post route. Add a middleware to `admin.index` and `admin.post`
```php
Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
});
```
- Add a `create` function in the `PostController`.
```php
 public function create(Post $post){
        return view('admin.posts.create'); 
    }
```
- Add a form in the `create.blade.php`
```blade
<x-admin-master>

    @section('content')

        <h1>Create</h1>

        <form method="post" action="" enctype="multipart/form-data">
            
                @csrf

                <div class="form-group">
                    <label for="title">Title</label>
                        <input  type="text"
                                name="title"
                                class="form-control"
                                id="title"
                                aria-describedby=""
                                placeholder="Enter title">
                </div>

                <div class="form-group">
                        <label for="file">File</label>
                        <input  type="file"
                                name="post_image"
                                class="form-control-file"
                                id="post_image">
                </div>

                <div class="form-group">
                    <textarea
                            name="body"
                            class="form-control"
                            id="body"
                            cols="30"
                            rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    @endsection

</x-admin-master>
```
### Storing and Viewing Posted Admin Post


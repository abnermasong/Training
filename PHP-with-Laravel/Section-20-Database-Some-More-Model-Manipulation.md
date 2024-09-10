# Dates
### Example code:
```php
use Illuminate\Support\Carbon;

Route::get('/dates', function(){

    $date = new DateTime('+1 week');
    echo $date->format('m-d-y');

    echo '<br>';

    echo Carbon::now();

    echo '<br>';

    echo Carbon::now()->diffForHumans();

    echo '<br>';

    echo Carbon::now()->addDays(15)->diffForHumans();

    echo '<br>';

    echo Carbon::now()->yesterday()->diffForHumans();
});
```
# Accessors & Mutators
- An accessor and mutator transforms an Eloquent attribute value when it is accessed.
### Example Code
```php
//User Model
  public function getNameAttribute($value){
        return strtoupper($value);
    }

 public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }
```
```php
//web.php
Route::get('/setname', function(){

    $user = User::findOrfail(1);
    $user->name = "Jean";
    $user->save();

});

Route::get('/getname', function(){

    $user = User::findOrfail(1);
    return $user;
    
});
```
# Query Scopes
### Local Implementation of Query Scopes
```php
//Post Model 
  public static function scopeAscOrder(Builder $query){

       return $query->orderBy('id','asc')->get();
    }
```
```php
//PostController
public function index()
    {
        //$posts = Post::scopeAscOrder(); //old syntax for implenting Local Scopes
        $posts = Post::ascorder(); // //new syntax for implenting Local Scopes
        return view('posts.index', compact('posts'));
    }
```
```php
//web.php
Route::resource('/posts',PostsController::class);
```


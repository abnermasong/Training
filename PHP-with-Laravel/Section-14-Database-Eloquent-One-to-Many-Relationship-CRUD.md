# Database - Eloquent One to Many Relationship CRUD
- In one-to-many relationship, a single model is a parent to one or more child models. This relationship can be defined by using `hasMany()` method.

### Creating/Inserting Data
```php
Route::get('/create', function(){
    $user = User::findOrFail(1);
    $post = new Post(['title'=>'First Post', 'body'=>'This is body']);
    $user->posts()->save($post);
});
```
### Reading Data
```php
Route::get('/read', function(){
    $user = User::findOrFail(1);
    foreach($user->posts as $post){
        echo $post->title . "<br>";
    }
});
```
### Updating Data
```php
Route::get('/update',function(){
    $user = User::find(1);
    $user->posts()->whereId(1)->update(['title'=>'I love laravel','body'=>'This is awesome']);
});
```
### Deleting Data
```php
Route::get('/delete',function(){
    $user = User::find(1);
    $user->posts()->whereId(1)->delete();
});
```


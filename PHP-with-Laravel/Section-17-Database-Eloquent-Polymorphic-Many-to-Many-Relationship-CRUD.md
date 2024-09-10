# Database - Eloquent Polymorphic Many to Many Relationship
```php
  //Taggable Model
class Taggable extends Model
```
```php
  //Post Model
    public function tags(){
        return $this->morphToMany('\App\Models\Tag', 'taggable');
    }
```
```php
  //Tag Model
    public function tags(){
        return $this->morphToMany('\App\Models\Tag', 'taggable');
    }
```
```php
  //Tag Model
    public function tags(){
        return $this->morphToMany('\App\Models\Tag', 'taggable');
    }
```
```php
  //Video Model
    public function tags(){
        return $this->morphToMany('\App\Models\Tag', 'taggable');
    }
```
### Creating/Inserting Data
```php
Route::get('/create', function(){

    $post = Post::create(['name'=>'My first post.']);
    
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'firstVideo.mov']);

    $tag2 = Tag::find(1);
    $video->tags()->save($tag2);

});
```
### Reading Data
```php
Route::get('/read', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        echo $tag;
    }
});
```
### Updating Data
```php
Route::get('/update', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        return $tag->whereName('safe')->update(['name'=>'updated tag.']);
    }
});
```
### Deleting Data
```php
Route::get('/delete', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        $tag->whereId(1)->delete();
    }
});
```


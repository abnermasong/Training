# Raw SQL Queries

## Creating/Inserting Data
- Use `create()` or `insert()` method.
#### Example:
```php
Route::get('/insert',function(){
    DB::insert('INSERT INTO posts (title, content) VALUES (?, ?);', ['PHP with laravel', 'PHP laravel is the best thing that has happened']);
});
```

## Reading Data
- Use `select()` or `find()` or `all()` method.
#### Example:
```php
Route::get('/read',function(){
    $result = DB::select('SELECT * FROM posts WHERE id = ?', [$id]);
return $result[0]->title;
});
```

## Updating Data
- Use `update()` or `save()` method.
#### Example:
```php
Route::get('/update', function(){
    $result = DB::update('UPDATE posts SET title = ? WHERE id = ?', ['Updated title', 1]);

    return $result ? "true" : "false";
});
```

## Deleting Data
- Use `delete()` method.
#### Example:
```php
Route::get('/delete', function(){
  $result = DB::delete('DELETE FROM posts WHERE id = ?', [$id]);
  return $deleted;
});
```



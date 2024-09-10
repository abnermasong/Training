# Database - Eloquent Polymorphic Relationship
- In polymorphic relationship, this allows a child model to belong to more than one type of model using a single association.
```php
  //Photo Model
    public function imageable(){
        return $this->morphTo();
    }
```
```php
  //Staff Model
    public function photos(){      
        return $this->morphMany('\App\Models\Photo', 'imageable');
    }
```
```php
  //Product Model
    public function photos(){      
        return $this->morphMany('\App\Models\Photo', 'imageable');
    }
```
### Creating/Inserting Data
```php
Route::get('/create', function(){
    $staff = Staff::findOrFail(1);
    $staff->photos()->create(['path'=>'example.jpg']);
});
```
### Reading Data
```php
Route::get('/read', function(){
    $staff = Staff::findOrFail(1);
    foreach($staff->photos as $photo){
        return $photo->path;
    }
});
```
### Updating Data
```php
Route::get('/update', function(){
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->path = "Update photo.";
    $photo->save();
});
```
### Deleting Data
```php
Route::get('/delete', function(){
    $staff = Staff::findOrFail(1);
    $staff->photos()->delete();
});
```

# Database - Eloquent Many to Many Relationship
- In many-to-many relationship, a record is linked to multiple records, and vice verse. This relationship can be defined by using `belongsToMany()` method.
```php
    public function roles(){
        return $this->belongsToMany('App\Models\Role');
    }
```
### Creating/Inserting Data
```php
Route::get('/create', function(){
    $user = User::find(1);
    $user->roles()->save(new Role(['name'=>'Administrator']));
});
```
### Reading Data
```php
Route::get('/read', function(){
    $user = User::findOrFail(1);
    foreach($user->roles as $role){
        echo $role->name;
    }
});
```
### Updating Data
```php
Route::get('/update', function(){
    $user = User::findOrFail(1);
    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name == 'Administrator'){
                $role->name = 'admin';
                $role->save();
            }
        }
    }
});
```
### Deleting Data
```php
Route::get('/delete', function(){
    $user = User::findOrFail(1);    
    foreach($user->roles as $role){
        $role->whereId(1)->delete();
    }
});
```


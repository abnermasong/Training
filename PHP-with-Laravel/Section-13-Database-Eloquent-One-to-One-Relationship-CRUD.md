# Database - Eloquent One to One Relationship CRUD

- In one-to-one relationship, each record in one table is linked to exactly one record in another table. This relationship can be defined by using `hasOne()` method.
```php

    public function address(){
        return $this->hasOne('App\Models\Address');
    }
```
### Creating/Inserting Data
```php
Route::get('/insert', function(){
    $user = User::findOrFail(1);
    $address = new Address(['address'=>'Mahawak Medellin Cebu']);
    $user -> address()->save($address);
});
```
### Reading Data
```php
Route::get('/read', function(){
    $user = User::findOrFail(1);
    echo $user->address()->address;
});
```
### Updating Data
```php
Route::get('/update', function(){
    $address = Address::whereUserId(1)->first();
    $address->address="New Address";
    $address->save();
});
```
### Deleting Data
```php
Route::get('/delete', function(){
    $user = User::find(1);
    $user->address()->whereId(5)->delete();
});
```

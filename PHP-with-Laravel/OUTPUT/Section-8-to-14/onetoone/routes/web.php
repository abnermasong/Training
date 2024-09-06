<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Address;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function(){

    $user = User::findOrFail(1);

    $address = new Address(['address'=>'Mahawak Medellin Cebu']);

    $user -> address()->save($address);


});

Route::get('/update', function(){

    $address = Address::whereUserId(1)->first();

    $address->address="New Address";

    $address->save();

});

Route::get('/delete', function(){

    $user = User::find(1);

    $user->address()->whereId(5)->delete();



});

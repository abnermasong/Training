<?php

use Illuminate\Support\Facades\Route;
use App\Models\Staff;
use App\Models\Photo;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/create', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->create(['path'=>'example.jpg']);

});

Route::get('/read', function(){

    $staff = Staff::findOrFail(1);

    foreach($staff->photos as $photo){

        return $photo->path;
    }


});

Route::get('/update', function(){

    $staff = Staff::findOrFail(1);

    $photo = $staff->photos()->whereId(1)->first();

    $photo->path = "Update photo.";

    $photo->save();

});

Route::get('/delete', function(){

    $staff = Staff::findOrFail(1);

    $staff->photos()->delete();



});

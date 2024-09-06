<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/post/{id}', '\App\Http\Controllers\PostController@index');

Route::get('/post/{id}/{name}', '\App\Http\Controllers\PostController@show_post');


Route::get('/alert', function(){
    return view('alert');
});

Route::get('/list', '\App\Http\Controllers\PostController@show_list');

Route::controller('/posts','PostController');

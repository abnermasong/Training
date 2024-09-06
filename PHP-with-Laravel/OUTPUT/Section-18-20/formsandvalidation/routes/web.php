<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});


// Route::controller('/posts', 'PostsController');
Route::resource('/posts',PostsController::class);

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

Route::get('/setname', function(){

    $user = User::findOrfail(1);
    $user->name = "Jean";
    $user->save();

});

Route::get('/getname', function(){

    $user = User::findOrfail(1);
    return $user;
    
});

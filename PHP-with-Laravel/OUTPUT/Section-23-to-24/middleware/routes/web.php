<?php

use App\Http\Middleware\RoleMiddleware;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//new syntax for Assigning Middleware to Routes
Route::get('/middleware', function(){

    return"Middleware Role";

})->middleware(RoleMiddleware::class);

// Route::get('/', function(){

//     $user = Auth::user();
//     dd($user);

// })->middleware(IsAdmin::class);

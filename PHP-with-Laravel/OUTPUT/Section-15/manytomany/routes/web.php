<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Models\Role;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){

    $user = User::find(1);

    // $role = new Role(['name'=>'Administrator']);

    $user->roles()->save(new Role(['name'=>'Administrator']));

});

Route::get('/read', function(){

    $user = User::findOrFail(1);

    foreach($user->roles as $role){

        echo $role->name;

    }

});

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

Route::get('/delete', function(){

    $user = User::findOrFail(1);
    
    foreach($user->roles as $role){

        $role->whereId(1)->delete();
    }


});

<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Video;
use App\Models\Tag;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', function(){

    $post = Post::create(['name'=>'My first post.']);
    
    $tag1 = Tag::find(1);
    $post->tags()->save($tag1);

    $video = Video::create(['name'=>'firstVideo.mov']);

    $tag2 = Tag::find(1);
    $video->tags()->save($tag2);

});

Route::get('/read', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        echo $tag;
    }

});

Route::get('/update', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        return $tag->whereName('safe')->update(['name'=>'updated tag.']);

    }

});

Route::get('/delete', function(){

    $post = Post::findOrFail(1);

    foreach($post->tags as $tag){

        $tag->whereId(1)->delete();

    }


});

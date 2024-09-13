<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    
    public function index(){
        
        $post = Post::all();

        return view ('admin.posts.index', ['post' => $post]);
        
    }

    public function show(Post $post){
        
        return view('blog-post', ['post' => $post]);
        
    }

    public function create(Post $post){
        
        return view('admin.posts.create');
        
    }
    public function store(){
        
        $inputs = request()->validate([
            'title' => 'required|min:8|max:255',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if (request('post_image')){
            $inputs['post_image'] = request('post_image')->store('images');
        }
    
        auth()->user()->post()->create($inputs);

        return back();
        
    }



}

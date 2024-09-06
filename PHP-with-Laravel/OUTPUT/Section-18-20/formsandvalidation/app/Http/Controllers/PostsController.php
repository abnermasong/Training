<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        // $posts = Post::all();
        //$posts = Post::scopeAscOrder(); //old syntax for implenting Local Scopes
        $posts = Post::ascorder(); // //new syntax for implenting Local Scopes

        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
      Post::create($request->all());
      return redirect('/posts');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //

        $posts = Post::findOrFail($id);

        return view('posts.show', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //

        $posts = Post::findOrFail($id);
        
        return view('posts.edit', compact('posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $post = Post::findOrFail($id);

        $post->update($request->all());

        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }

    // public function store(Request $request)
    // {
    //     $input = $request->all();
    //     $file = $request->file('file');
    //     if($file){
    //             $name = $file->getClientOriginalName();
    //             $file->move('images', $name);

    //             $input['path'] = $name;
    //         }

    //     Post::create($input);
    // }

    
}

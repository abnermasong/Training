<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    
    // public function index()
    // {
    //     return view('home');
    // }

    public function index(Request $request)
    {
        //Setting up sessions
        // $request->session()->put(['name'=>'aj']);
        
        //Updating sessions
        //session(['more sessions'=>'replaced session']);
        
        // Deleting sessions
        //$request->session()->forget('more sessions');
        
        // Delete all sessions
         $request->session()->flush();
        
        //Reading sessions
        return $request->session()->all();
        
    }

}

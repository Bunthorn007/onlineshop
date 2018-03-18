<?php

namespace App\Http\Controllers;

use App\Post;
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $rcposts = Post::all()->sortBy('created_at');
        $rmposts = Post::all()->sortByDesc('view');;

        return view('home', compact('posts', 'rcposts', 'rmposts'));
    }

}

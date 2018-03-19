<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(){

        $posts = Post::all();
        $rcposts = Post::all()->sortByDesc('created_at');
        $rmposts = Post::all()->sortByDesc('view');;

        return view('home', compact('posts', 'rcposts', 'rmposts'));
    }

    public function detail($id){

        $post = Post::find($id);
        $posts = Post::all()->sortByDesc('view');
        $comments = Comment::where('post_id',$post->id)->get();

        //Increment view no.
        $view = $post->view + 1;
        $post->update(['view'=>$view]);

        $post->content = nl2br($post->content);
        return view('detail', compact('post', 'posts', 'comments'));
    }

}

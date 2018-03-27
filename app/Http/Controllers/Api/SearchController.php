<?php

namespace App\Http\Controllers\Api;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{


    public function search(Request $request)
    {
        // First we define the error message we are going to show if no keywords
        // existed or if no results found.
        $error = ['error' => 'No results found, please try with different keywords.'];
        // Making sure the user entered a keyword.
        if($request->has('q')) {
            // Using the Laravel Scout syntax to search the products table.
            $posts = Post::search($request->get('q'))->get();

            $posts = $posts->map(function ($post, $key) {
                return [
                    'title' => str_limit($post->title, 22),
                    'content' => str_limit($post->content, 35),
                    'photo' => $post->user->photo->file,
                    'url'  => url('/detail/'.$post['id']),
                    'image' => asset($post->images->first()->file),
                    'view' => $post->view,
                    'time' => $post-> created_at->diffForHumans(),
                    'user' => $post->user->firstname.' '.$post->user->lastname,
                ];
            });
            // If there are results return them, if none, return the error message.
            return $posts->count() ? $posts : $error;
        }
        // Return the error message if no keywords existed
        return $error;
    }
}

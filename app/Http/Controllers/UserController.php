<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Image;
use App\Month;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {

        $posts = Post::orderByRaw('RAND()')->take(8)->get();
        $categories = Category::all();
        $rcposts = Post::all()->sortByDesc('created_at')->take(8);
        $rmposts = Post::all()->sortByDesc('view')->take(8);

        return view('home', compact('posts', 'rcposts', 'rmposts', 'categories'));
    }

    public function detail($id)
    {

        $post = Post::find($id);
        $images = Image::where('post_id',$post->id)->get();
        $posts = Post::all()->sortByDesc('view');
        $comments = Comment::where('post_id', $post->id)->get();
        $categories = Category::all();

        //Increment view no.
        $view = $post->view + 1;
        $post->update(['view' => $view]);

        $post->content = nl2br($post->content);
        return view('detail', compact('post', 'posts', 'comments', 'images', 'categories'));
    }

    public function profile($id)
    {

        $user = User::find($id);
        $posts = Post::where('user_id', $user->id)->get();
        $categories = Category::all();

        return view('profile', compact('user', 'posts', 'categories'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $months = Month::all();
        $categories = Category::all();

        $birthdate = explode("-", $user->birthdate);
        return view('user.edit', compact('user', 'birthdate', 'months', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::findOrFail($id);

        $birthdate = $input['birth_day'] . '-' . $input['birth_month'] . '-' . $input['birth_year'];
        $request->merge(['birthdate' => $birthdate]);

        $data = $request->all();
        if ($file = $request->file('photo_id')) {
            //delete old file
            if ($user->photo_id != 0) {
                unlink(public_path() . $user->photo->file);
                Photo::findOrFail($user->photo_id)->delete();
            }

            //Create new file
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file' => $name]);
            $data['photo_id'] = $photo->id;

            //Update Session
            if (Auth::user()->id == $id) {
                $username = $user->firstname . ' ' . $user->lastname;
                $image = $photo->file;
                $request->session()->put(['username' => $username, 'image' => $image]);
            }
        }
        $user->update($data);
        $url = "/edit/" . $user->id;

        return redirect('/user/edit/' . $user->id);
    }

    public function doImageUpload(Request $request){

        $file = $request->file('file');

        $filename = time().$file->getClientOriginalName();

        $file->move('images', $filename);

        Image::create(['file' => $filename]);
    }

}

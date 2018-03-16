<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.post.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('admin.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=> $name]);
            $data['photo_id'] = $photo->id;
        }


        $user->posts()->create($data);

        return redirect('/admin/post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);

        //Increment view no.
        $view = $post->view + 1;
        $post->update(['view'=>$view]);

        $post->content = nl2br($post->content);
        return view('admin.post.detail', compact('post', $post));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.post.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $data = $request->all();

        if($file = $request->file('photo_id')){
            //delete old file
            if($post->photo_id != 0){
                unlink(public_path(). $post->photo->file);
                Photo::findOrFail($post->photo_id)->delete();
            }

            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=> $name]);
            $data['photo_id'] = $photo->id;
        }

        $post->update($data);

        return redirect('/admin/post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::findOrFail($id);

        if($post->photo_id != 0){
            unlink(public_path(). $post->photo->file);
            Photo::findOrFail($post->photo_id)->delete();
        }
        $post->delete();
        return redirect('admin/post');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.post.delete', compact('post', 'categories'));
    }
}

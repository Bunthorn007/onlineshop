<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Image;
use App\Post;
use Illuminate\Support\Facades\Storage;
use ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserPostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $posts = Post::where('user_id', $userId)->get();

        return view('user.post.index', compact('posts', $posts));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('user.post.create', compact('categories'));
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

        $id = $user->posts()->create($data)->id;

        return redirect('/user/post/uploadimage/'.$id);
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
        $images = Image::where('post_id',$post->id)->get();
        $comments = Comment::where('post_id', $post->id)->get();

        //Increment view no.
        $view = $post->view + 1;
        $post->update(['view'=>$view]);

        $post->content = nl2br($post->content);
        return view('user.post.detail', compact('post', 'images', 'comments'));
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

        return view('user.post.edit', compact('post', 'categories'));
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


        $post->update($request);

        return redirect('/user/post');
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

        if($post->images->has(0)){
            foreach ($post->images as $file){
                unlink($file->file);
                Image::where('post_id',$post->id)->delete();
            }
        }
        $post->delete();
        return redirect('user/post');
    }

    public function delete($id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('user.post.delete', compact('post', 'categories'));
    }

    public function doImageUpload(Request $request){
        $file = $request->file('file');
        $post_id = $request->input('post_id');

        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.uniqid().'.'.$extension;

        //Storage::put('public/images/'. $filenametostore, fopen($file, 'r+'));
        Storage::put('public/images/thumbnail/'. $filenametostore, fopen($file, 'r+'));

        //Resize image here
        $thumbnailpath = public_path('storage/images/thumbnail/'.$filenametostore);

        $img = ResizeImage::make($thumbnailpath)->resize(500, 400)->save($thumbnailpath);

        Image::create(['post_id'=>$post_id, 'file' => $filenametostore]);
    }

    public function uploadImage($id){

        $pid = $id;
        return view('user.post.uploadimage', compact('pid'));
    }
}

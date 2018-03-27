<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Image;
use App\Month;
use App\Photo;
use App\Post;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {

//        $posts = Post::orderByRaw('RAND()')->take(8)->get();
        $posts = Post::orderBy('created_at','DESC')->limit(4)->get();
        $categories = Category::all();
        $shops = Shop::all();
        $rmposts = Post::all()->sortByDesc('view')->take(8);

        return view('home', compact('posts', 'rmposts', 'categories', 'shops'));
    }

    public function detail($id)
    {

        $post = Post::find($id);
        $images = Image::where('post_id',$post->id)->get();
        $posts = Post::orderBy('created_at','DESC')->limit(4)->get();
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
        $posts = Post::orderBy('created_at','DESC')->limit(8)->get();
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

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $posts = Post::where('id','<',$id)->orderBy('created_at','DESC')->limit(4)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {

                $output.= '<div class="col-md-3" style="padding-left: 5px; padding-right: 5px;">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="media">
                                            <div class="media-middle media-left">
                                                <a href="/profile/'.$post->user_id.'">
                                                    <img class="media-object img-circle" width="32" height="32" src="'.$post->user->photo->file.'">
                                                </a>
                                            </div>
                                            <div class="media-middle media-body">
                                                <a class="link-muted" href="/profile/'.$post->user_id.'">
                                                    '.$post->user->firstname . ' '. $post->user->lastname.'
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-image">
                                        <a class="link-muted" href="/detail/'.$post->id.'">
                                            <img class="img-responsive" width="100%" height="50%" src="'.asset($post->images->first()->file).'">
                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title fw-l">
                                            <strong><a class="link-muted" href="/detail/'.$post->id.'">'.str_limit($post->title, 16).'</a></strong>
                                        </h4>
                                        <small>'.str_limit($post->content, 25).'</small>
                                    </div>
                                    <div class="card-footer">
                                        <small>
                                            <span class="icon icon-eye icon-lg icon-fw"></span>'.$post->view.' views
                                            <span class="pull-right"><span class="icon icon-clock-o icon-lg icon-fw"></span>'.$post-> created_at->diffForHumans().'</span>
                                        </small>
                                    </div>
                                </div>
                            </div>';

            }

            $output .= '<div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                            <button id="btn-more" data-id="'.$post->id.'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                        </div>';

            echo $output;
        }
    }

    public function loadListDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $posts = Post::where('id','<',$id)->orderBy('created_at','DESC')->limit(4)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {

                $output.= '<li class="cart-list-item">
                                <div class="cart-list-image">
                                    <a href="/detail/'.$post->id.'">
                                        <img class="cart-list-thumbnail" src="'.asset($post->images->first()->file).'">
                                    </a>
                                </div>
                                <div class="cart-list-details" >
                                    <h4 class="cart-list-name">
                                        <a href="/detail/'.$post->id.'">'.str_limit(title_case($post->title), 44).'</a>
                                    </h4>
                                    <p class="cart-list-description">
                                        <small><span class="icon icon-user icon-lg icon-fw"></span> Posted By :'.$post->user->firstname.' '. $post->user->lastname.'</small>
                                        <span class="pull-right"><span class="icon icon-eye icon-lg icon-fw"></span>'.$post->view.' views</span>
                                    </p>
                                </div>
                            </li>';

            }

            $output .= '<div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                            <button id="btn-more" data-id="'.$post->id.'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                        </div>';

            echo $output;
        }
    }

    public function getVueSearch(Request $request)
    {
        $search =  $request->search;
        $shops = '';

        if (trim($request->search)) {
            $shops = Shop::where('name','LIKE',"%{$search}%")->orderBy('created_at','DESC')->limit(8)->get();

            $shops = $shops->map(function ($shop, $key) {
                return [
                    'name' => $shop['name'],
                    'url'  => url('/shop/'.$shop['id']),
                    'image' => $shop->photo->file,
                    'user' => $shop->user->firstname.' '.$shop->user->lastname,
                ];
            });
        }

        return $shops;
    }

    public function myProfile()
    {

        $user = User::find(Auth::user()->id);
        $posts = Post::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->limit(8)->get();
        $categories = Category::all();

        return view('user.myprofile', compact('user', 'posts', 'categories'));
    }

    public function search(){

        $categories = Category::all();
        return view('search', compact('categories'));
    }

    public function searchbycategory($id){

        $categories = Category::all();
        $category =Category::find($id);
        $posts = Post::where('category_id','=',$id)->orderBy('created_at','DESC')->limit(16)->get();
        $shops = Shop::all();
        $count = Post::where('category_id','=',$id)->count();


        return view('searchby', compact('categories', 'posts', 'shops', 'category', 'count'));
    }

    public function loadListDataAjaxByCategory(Request $request)
    {
        $output = '';
        $id = $request->id;

        $posts = Post::where('id','<',$id)->orderBy('created_at','DESC')->limit(4)->get();

        if(!$posts->isEmpty())
        {
            foreach($posts as $post)
            {

                $output.= '<li class="cart-list-item">
                                <div class="cart-list-image">
                                    <a href="/detail/'.$post->id.'">
                                        <img class="cart-list-thumbnail" src="'.asset($post->images->first()->file).'">
                                    </a>
                                </div>
                                <div class="cart-list-details" >
                                    <h4 class="cart-list-name">
                                        <a href="/detail/'.$post->id.'">'.str_limit(title_case($post->title), 44).'</a>
                                    </h4>
                                    <p class="cart-list-description">
                                        <small><span class="icon icon-user icon-lg icon-fw"></span> Posted By :'.$post->user->firstname.' '. $post->user->lastname.'</small>
                                        <span class="pull-right"><span class="icon icon-eye icon-lg icon-fw"></span>'.$post->view.' views</span>
                                    </p>
                                </div>
                            </li>';

            }

            $output .= '<div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                            <button id="btn-more" data-id="'.$post->id.'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                        </div>';

            echo $output;
        }
    }

}

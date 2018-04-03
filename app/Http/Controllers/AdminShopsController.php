<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Product;
use App\ProductCategory;
use App\Shop;
use App\User;
use Illuminate\Http\Request;

class AdminShopsController extends Controller
{

    public function __construct()
    {
        $this->middleware('isAdmin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shops = Shop::all();

        return view('admin.shop.index', compact('shops'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $shops = Shop::get();
        $subset = $shops->map(function ($user) {
            return collect($user->toArray())
                ->only(['user_id'])
                ->all();
        });
        $users = User::whereNotIn('id',$subset)->get();

        return view('admin.shop.create', compact('users'));
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

        if($file = $request->file('photo_id')){
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);

            $photo = Photo::create(['file'=> $name]);
            $data['photo_id'] = $photo->id;
        }

        Shop::create($data);

        return redirect('admin/shop');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        $categories = Category::all()->sortBy('name');
        $procategories = ProductCategory::where('shop_id', $shop->id)->get();
        $products = Product::where('shop_id', $shop->id)->get();

        return view('admin.shop.detail', compact('categories', 'shop', 'procategories', 'products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop = Shop::find($id);

        $shops = Shop::get();
        $subset = $shops->map(function ($user) {
            return collect($user->toArray())
                ->only(['user_id'])
                ->all();
        });
        $users = User::whereNotIn('id',$subset)->get();

        return view('admin.shop.edit', compact('users', 'shop'));
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
        $shop = Shop::findOrFail($id);
        $data = $request->all();
        if($file = $request->file('photo_id')){
            //delete old file
            if($shop->photo_id != 0){
                unlink(public_path(). $shop->photo->file);
                Photo::findOrFail($shop->photo_id)->delete();
            }

            //Create new file
            $name = time(). $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=> $name]);
            $data['photo_id'] = $photo->id;


        }

        $shop->update($data);

        return redirect('admin/shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop = Shop::find($id);

        if($shop->photo_id != null){
            unlink(public_path(). $shop->photo->file);
            Photo::findOrFail($shop->photo_id)->delete();
        }
        $shop->delete();
        return redirect('admin/shop');
    }

    public function delete($id)
    {

        $shop = Shop::find($id);

        return view('admin.shop.delete', compact( 'shop'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Category;
use App\Photo;
use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserShopsController extends Controller
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
        $shop = Shop::find(Auth::user()->shop->id);
        $categories = Category::all();
        $procategories = ProductCategory::where('shop_id', Auth::user()->shop->id)->get();
        $products = Product::where('shop_id', $shop->id)->get();

        return view('user.shop.index', compact('categories', 'shop', 'procategories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('user.shop.create', compact('categories'));
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

        $shop = Shop::create($data);
        $request->session()->put(['shop'=>$shop->id]);
        return redirect('user/shop/'.$shop->id);
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
        $categories = Category::all();
        $procategories = ProductCategory::where('shop_id', Auth::user()->shop->id)->get();
        $products = Product::where('shop_id', Auth::user()->shop->id)->get();

        return view('user.shop.index', compact('categories', 'shop', 'procategories', 'products'));
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
        $categories = Category::all();

        return view('user.shop.edit', compact('categories', 'shop'));
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
        $categories = Category::all();
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

        return redirect('user/shop');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addProCategory(Request $request)
    {

        $data = new ProductCategory();
        $data->name = $request->name;
        $data->shop_id = Auth::user()->shop->id;
        $data->save();
        $data->time = $data->created_at->diffForHumans();
        return response()->json($data);

    }

    public function readProCategories($id)
    {
        $data = ProductCategory::where('shop_id',$id)->get();
        $shop_id = $id;
        $categories = Category::all();

        return view('user.shop.category', compact('data', 'categories', 'shop_id'));
    }

    public function editProCategory(Request $request)
    {
        $data = ProductCategory::find($request->id);
        $data->name = $request->name;
        $data->save();
        $data->time = $data->created_at->diffForHumans();
        return response()->json($data);
    }

    public function deleteProCategory(Request $request)
    {
        ProductCategory::find($request->id)->delete();
        return response()->json();
    }
}

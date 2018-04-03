<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\ProductImage;
use ResizeImage;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::where('shop_id', Auth::user()->shop->id)->get();
        $categories = Category::all()->sortBy('name');
        $proCategories = ProductCategory::where('shop_id', Auth::user()->shop->id)->get();

        return view('user.product.index', compact('categories', 'proCategories', 'products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all()->sortBy('name');
        $proCategories = ProductCategory::where('shop_id', Auth::user()->shop->id)->get();

        return view('user.product.create', compact('categories', 'proCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['shop_id'=>Auth::user()->shop->id]);

        $product = Product::create($request->all());
        $id = $product->id;

        return redirect('/user/product/uploadimage/'.$id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $images = ProductImage::where('product_id',$product->id)->get();
        $categories = Category::all()->sortBy('name');

        //Increment view no.
        $view = $product->view + 1;
        $product->update(['view'=>$view]);

        $product->detail = nl2br($product->detail);
        return view('user.product.detail', compact('product', 'images', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $categories = Category::all()->sortBy('name');
        $proCategories = ProductCategory::where('shop_id', Auth::user()->shop->id)->get();

        return view('user.product.edit', compact('categories', 'proCategories', 'product'));
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

        $product = Product::find($id);


        $product->update($request->all());

        return redirect('/user/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);

        if($product->productImages->has(0)){
            foreach ($product->productImages as $file){
                unlink($file->file);
                ProductImage::where('product_id',$product->id)->delete();
            }
        }
        $product->delete();
        return redirect('user/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $categories = Category::all()->sortBy('name');
        $proCategories = ProductCategory::where('shop_id', Auth::user()->shop->id)->get();

        return view('user.product.delete', compact('product', 'categories', 'proCategories'));
    }

    public function doImageUpload(Request $request){
        $file = $request->file('file');
        $product_id = $request->input('product_id');

        //get filename with extension
        $filenamewithextension = $file->getClientOriginalName();
        //get filename without extension
        $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

        //get file extension
        $extension = $file->getClientOriginalExtension();

        //filename to store
        $filenametostore = $filename.'_'.uniqid().'.'.$extension;

        //Storage::put('public/images/'. $filenametostore, fopen($file, 'r+'));
        Storage::put('public/images/product/'. $filenametostore, fopen($file, 'r+'));

        //Resize image here
        $thumbnailpath = public_path('storage/images/product/'.$filenametostore);

        $img = ResizeImage::make($thumbnailpath)->resize(510, 600)->save($thumbnailpath);

        ProductImage::create(['product_id'=>$product_id, 'file' => $filenametostore]);
    }

    public function uploadImage($id){

        $pid = $id;
        $categories = Category::all()->sortBy('name');

        return view('user.product.uploadimage', compact('pid', 'categories'));
    }
}

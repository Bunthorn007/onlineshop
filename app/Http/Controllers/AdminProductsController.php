<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Shop;
use ResizeImage;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AdminProductsController extends Controller
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

        $products = Product::all();

        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops = Shop::all();

        return view('admin.product.create', compact('shops', 'proCategories'));
    }

    public function categorieslist(){

        $shop = Input::get('option');
        $proCategories = ProductCategory::where('shop_id', '=', $shop)->pluck('name', 'id');

        return $proCategories;
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $id = Product::create($request->all())->id;

        return redirect('/admin/product/uploadimage/'.$id);

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

        //Increment view no.
        $view = $product->view + 1;
        $product->update(['view'=>$view]);

        $product->detail = nl2br($product->detail);
        return view('admin.product.detail', compact('product', 'images'));
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
        $shops = Shop::all();

        return view('admin.product.edit', compact('product', 'shops'));
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

        return redirect('/admin/product');
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
        return redirect('admin/product');
    }

    public function delete($id)
    {
        $product = Product::find($id);

        return view('admin.product.delete', compact('product'));
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
        return view('admin.product.uploadimage', compact('pid'));
    }
}

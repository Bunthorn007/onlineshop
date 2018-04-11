<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class ShopsController extends Controller
{

    public function index($id){

        $shop = Shop::find($id);
        $categories = ProductCategory::where('shop_id', $id)->orderBy('name','ASC')->get();
        $products = Product::where('shop_id', $shop->id);
        $products = $products->where('status','=',1)->orderBy('created_at','DESC')->limit(16)->get();

        return view('shop.shop', compact('categories', 'shop', 'products'));
    }

    public function productDetail($id){

        $product = Product::find($id);
        $shop = Shop::find($product->shop->id);
        $images = ProductImage::where('product_id',$product->id)->get();
        $products = Product::where('shop_id', $shop->id);
        $products = $products->where('product_category_id', $product->product_category_id);
        $products = $products->where('id','!=', $id)->orderBy('created_at','DESC')->limit(8)->get();
        $categories = ProductCategory::where('shop_id', $shop->id)->orderBy('name','ASC')->get();

        //Increment view no.
        $view = $product->view + 1;
        $product->update(['view'=>$view]);

        $product->detail = nl2br($product->detail);
        return view('shop.detail', compact('product', 'images', 'categories', 'shop', 'products'));
    }

    public function searchByCategory($id){

        $category = ProductCategory::find($id);
        $categories = ProductCategory::where('shop_id', $category->shop->id)->orderBy('name','ASC')->get();
        $shop = Shop::find($category->shop->id);
        $products = Product::where('shop_id', $shop->id);
        $products = $products->where('product_category_id', $id)->orderBy('created_at','DESC')->limit(16)->get();
        $count = $products->count();

        return view('shop.searchbycategory', compact('categories', 'shop', 'products', 'count'));
    }

    public function loadDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;
        $search =  $request->name;
        $products = Product::where('shop_id', $id);
        $products = $products->where('name','LIKE',"%{$search}%")->orderBy('created_at','DESC')->limit(16)->get();

        $output .= '<div class="row" id="remove-row">
                        <div class="col-xs-12">
                            <ul class="products">';
        if(!$products->isEmpty())
        {
            foreach($products as $product)
            {

                $output.= '<li class="product">
                            <div class="product-image">
                                <a class="overlay" href="'.url('/shop/product/'.$product->id).'">
                                    <div class="overlay-image">
                                        <img class="img-responsive" src="'.asset($product->productImages->first()->file).'">
                                    </div>
                                    <div class="overlay-content overlay-top">
                                        <span class="label label-success pull-right">SALE!</span>
                                    </div>
                                </a>
                            </div>
                            <div class="product-details">
                                <h5 class="product-name">
                                    <a class="link-muted" href="'.url('/shop/product/'.$product->id).'">'.$product->name.'</a>
                                </h5>
                                <span class="product-rating">
                                    <span class="divider">
                                        <span class="divider-content">
                                            <span class="icon icon-star active"></span>
                                            <span class="icon icon-star active"></span>
                                            <span class="icon icon-star active"></span>
                                        </span>
                                    </span>
                                </span>
                                <span class="product-price">
                                    <span class="product-price-current"> $ '.$product->price.'</span>
                                </span>
                            </div>
                        </li>';

            }

            $output .= '</ul></div></div>';

            echo $output;
        }
    }

    public function contact($id){

        $shop = Shop::find($id);
        $categories = ProductCategory::where('shop_id', $id)->orderBy('name','ASC')->get();

        $shop->address = nl2br($shop->address);
        return view('shop.contact', compact('shop', 'categories'));
    }

    public function sendEmail(Request $request){

        $id = $request->shop_id;
        $shop = Shop::find($id);
        $categories = ProductCategory::where('shop_id', $id)->orderBy('name','ASC')->get();
        $products = Product::where('shop_id', $shop->id)->orderBy('created_at','DESC')->limit(16)->get();


        $data = array(
            'name'=> $request->name,
            'from' => $request->email,
            'to' => $shop->user->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message

        );

        Mail::send('shop.email.contact', $data, function ($message) use($data){
            $message->from($data['from']);
            $message->to($data['to']);
            $message->subject($data['subject']);
        });

        Session::flash('success', 'Your email has been sent');

        return view('shop.shop', compact('categories', 'shop', 'products'));
    }

    public function loadListDataAjax(Request $request)
    {
        $output = '';
        $id = $request->id;

        $product = Product::find($id);
        $shop = Shop::find($product->shop->id);
        $products = Product::where('shop_id', $shop->id);
        $products = $products->where('id','<', $id)->orderBy('created_at','DESC')->limit(4)->get();


        if(!$products->isEmpty())
        {
            foreach($products as $pro)
            {

                $output.= '<li class="cart-list-item">
                                <div class="cart-list-image">
                                    <a href="shop/product/'.$pro->id.'">
                                        <img class="cart-list-thumbnail" src="'.asset($pro->productImages->first()->file).'">
                                    </a>
                                </div>
                                <div class="cart-list-details" >
                                    <h4 class="cart-list-name">
                                        <a href="shop/product/'.$pro->id.'">'.str_limit(title_case($pro->name), 70).'</a>
                                    </h4>
                                    <p class="cart-list-description">
                                        <small><span class="icon icon-user icon-lg icon-fw"></span> Posted By :'.$pro->shop->user->firstname.' '. $pro->shop->user->lastname.'</small>
                                        <span class="pull-right"><span class="icon icon-eye icon-lg icon-fw"></span>'.$pro->view.' views</span>
                                    </p>
                                </div>
                            </li>';

            }

            $output .= '<div id="remove-row" style="padding-left: 5px; padding-right: 5px;">
                            <button id="btn-more" data-id="'.$pro->id.'" class="nounderline btn-block mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--accent btn btn-primary"> Load More </button>
                        </div>';

            echo $output;
        }
    }
}

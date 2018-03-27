<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use App\ProductImage;
use App\Shop;
use Illuminate\Http\Request;

class ShopsController extends Controller
{

    public function index($id){

        $shop = Shop::find($id);
        $categories = ProductCategory::where('shop_id', $id)->orderBy('name','ASC')->get();
        $products = Product::where('shop_id', $shop->id)->orderBy('created_at','DESC')->limit(16)->get();

        return view('shop.shop', compact('categories', 'shop', 'products'));
    }

    public function productDetail($id){

        $product = Product::find($id);
        $shop = Shop::find($product->shop->id);
        $images = ProductImage::where('product_id',$product->id)->get();
        $categories = ProductCategory::where('shop_id', $shop->id)->orderBy('name','ASC')->get();

        //Increment view no.
        $view = $product->view + 1;
        $product->update(['view'=>$view]);

        $product->detail = nl2br($product->detail);
        return view('shop.detail', compact('product', 'images', 'categories', 'shop'));
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
}

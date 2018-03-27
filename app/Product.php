<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = ['shop_id', 'product_category_id', 'name', 'price','view', 'detail', 'status'];


    public function productCategory(){

        return $this->belongsTo('App\ProductCategory');
    }

    public function productImages(){

        return $this->hasMany('App\ProductImage');
    }

    public function shop(){

        return $this->belongsTo('App\Shop');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{

    protected $uploads = 'storage/images/product/';

    protected $fillable = ['product_id', 'file'];

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}

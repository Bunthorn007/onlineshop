<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $fillable=[
      'user_id', 'category_id', 'photo_id', 'title', 'content', 'price', 'location', 'view'
    ];


    public function user(){

        return $this->belongsTo('App\User');
    }

    public function images(){

        return $this->hasMany('App\Image');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }

    //Comment Function
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

}

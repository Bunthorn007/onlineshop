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

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function category(){

        return $this->belongsTo('App\Category');
    }

    //Comment Function
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function getThreadedComments(){
        return $this->comments()->with('user')->get()->threaded();
    }

    public function addComment($attributes)
    {
        $comment = (new Comment())->forceFill($attributes);
        $comment->user_id = auth()->id();
        return $this->comments()->save($comment);
    }
}

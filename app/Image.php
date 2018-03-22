<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $uploads = 'storage/images/thumbnail/';

    protected $fillable = ['post_id', 'file'];

    public function getFileAttribute($photo){
        return $this->uploads . $photo;
    }
}

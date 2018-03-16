<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dates = ['deleted_at'];


    protected $fillable = [
        'role_id', 'firstname', 'lastname', 'gender', 'birthdate', 'email', 'password','phone', 'address', 'status', 'photo_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){

        return $this->belongsTo('App\Role');
    }

    public function photo(){

        return $this->belongsTo('App\Photo');
    }

    public function isAdmin(){

        if($this->role->name == "Admin"){
            return true;
        }
        return false;
    }

    public function posts(){

        return $this->hasMany('App\Post');
    }
}

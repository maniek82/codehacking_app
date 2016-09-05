<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id','photo_id','is_active',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //relationship
    public function posts() {
        return $this->hasMany('App\Post');
    }
    
    
    public function role() {
        return $this->belongsTo('App\Role');
    }
    
    
    public function photo() {
        return $this->belongsTo('App\Photo');
    }
    
    
    //accessor
    public function getNameAttribute($value) {
        return ucfirst($value);
    }
    
    //check if user is admin
    public function isAdmin() {
        if($this->role->name =="administrator" && $this->is_active ==1) {
            return true;
        }
        return false;
    }
    
    
    
}

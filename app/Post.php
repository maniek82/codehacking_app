<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{


 protected $fillable = ['category_id','photo_id','user_id','title','body'];

  public function user() {
      return $this->belongsTo('App\User');
  }  
  
  
     public function photo() {
      return $this->belongsTo('App\Photo');
  }  
  
   public function category() {
      return $this->belongsTo('App\Category');
  } 
  
  public function comments() {
   return $this->hasMany('App\Comment');
  }
  
  
  
  //accessor
    // public function getBodyAttribute($value) {
     
    //     return trim(substr($value, 0, 40))."...";
            //return str_limit($value, 10);//laravel function
    // }

}

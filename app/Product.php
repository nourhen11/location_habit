<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  
    protected $fillable = [
        'title', 'description', 'price','user_id','category_id','size','color'
    ];

    public function user()
    {
        return $this->hasOne('App\User','id','user_id');
    }
    public function category()
    {
        return $this->hasOne('App\Category','id','category_id');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

}

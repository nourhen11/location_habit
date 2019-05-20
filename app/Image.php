<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = [
        'product_id', 'name'
    ];

    public function image()
    {
        return $this->hasOne('App\Product','id','product_id');
    }
}

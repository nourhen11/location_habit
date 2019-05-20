<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'product_id', 'user_id', 'date_reservation','date_retour','price','status'
    ];
}

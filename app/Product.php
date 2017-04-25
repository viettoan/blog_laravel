<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = "products";

    public function booking()
    {
        return $this->hasOne('App\Booking', 'product_id', 'id');
    }

    public function user(){
    	return $this->belongsTo('App\User');
    }
}

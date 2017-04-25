<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $table="booking";

    public function product(){
    	
    	return $this->belongsTo('App\Product');
    }
    
}

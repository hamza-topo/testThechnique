<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryTime extends Model
{
    protected $fillable=[
    	'delivery_at',"city_id"
    ];
    // Disable Timestamps
    public $timestamps = false;
   
}

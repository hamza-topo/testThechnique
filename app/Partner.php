<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $fillable=[
    	'partner_name'
    ];
     public function city()
    {
        return $this->hasOne('App\City');
    }
}

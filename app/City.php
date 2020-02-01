<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class City extends Model
{

	protected $fillable=[
    	'citiy_name','partner_id'
    ];
    public function partner()
    {
        return $this->BelongsTo('App\Partner');
    }
}

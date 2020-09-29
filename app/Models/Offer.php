<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model 
{

    protected $table = 'offers';
    public $timestamps = true;
    protected $fillable = array('photo', 'title', 'content', 'from', 'to', 'restaurant_id');

    public function restaurant()
    {
    	return $this->belongsTo(Restaurant::class);
    }

}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model 
{

    protected $table = 'products';
    public $timestamps = true;
    protected $fillable = array('photo', 'title', 'content', 'price', 'restaurant_id', 'price_offer');

    
    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant');
    }
    

    public function orders()
    {
        return $this->belongsToMany('App\Models\Order');
    }

    public function cart(){
        return $this->hasMany('App\Models\Cart');
    }

}
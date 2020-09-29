<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurant extends Authenticatable 
{

    protected $table = 'restaurants';
    public $timestamps = true;
    protected $fillable = array('name', 'is_activate', 'email', 'phone', 'password', 'minimum_order', 'delivery_cost', 'whats_app', 'delivery_number', 'category_id', 'region_id', 'api_token', 'photo' , 'pin_code');

    public function region()
    {
        return $this->belongsTo('App\Models\Region');
    } 

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }

    public function notifications()
    {
        return $this->morphMany('App\Models\Notification', 'notifiable');
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function tokens()
    {
        return $this->morphMany('App\Models\Token', 'accountable');
    }

    protected $hidden = [
        'password', 'api_token'
    ];

}
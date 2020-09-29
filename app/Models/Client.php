<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable 
{

    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array('name', 'email', 'phone', 'photo', 'password', 'region_id', 'pin_code','is_activate');

    
    
    public function region(){
        return $this->belongsTo('App\Models\Region');
    }

    public function carts(){
        return $this->hasMany('App\Models\Cart');
    }

    public function orders()
    {
        return $this->hasMany('App\Models\Order');
    }

    public function comments()
    {
        return $this->hasMany('App\Models\Comment');
    }

    public function notifications()
    {
        return $this->morphToMany('App\Models\Notification', 'notifiable');
    }

    public function tokens()
    {
		return $this->morphMany('App\Models\Token', 'accountable'); 
	}

    protected $hidden = [
        'password', 'api_token'
    ];

}
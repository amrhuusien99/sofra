<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model 
{

    protected $table = 'comments';
    public $timestamps = true;
    protected $fillable = array('comment', 'restaurant_id', 'client_id');

   

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

}
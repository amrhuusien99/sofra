<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model 
{

    protected $table = 'settings';
    public $timestamps = true;
    protected $fillable = array('email', 'facebook', 'twitter', 'insta', 'bank_account', 'about_us', 'commission');

}
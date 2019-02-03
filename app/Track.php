<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Track extends Model
{
    protected $fillable = [

        'user_id', 'user_name' , 'user_email' , 'ipaddress' , 'page' , 'url' , 'type' , 'referrer'  
        	, 'created_at' , 'updated_at'
        
    ];
}

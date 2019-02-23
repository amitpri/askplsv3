<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgentCreate extends Model
{
    protected $table = 'users';

    public function category()
    {

        return $this->belongsTo('App\Category', 'category_id');

    } 

    public function city()
    {

        return $this->belongsTo('App\City', 'city_id');

    } 
}

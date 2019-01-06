<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    public function category()
    {

        return $this->belongsTo('App\Category', 'category_id');

    } 
}

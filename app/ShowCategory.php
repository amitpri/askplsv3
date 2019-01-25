<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ShowCategory extends Model
{
    protected $table = 'categories';

    public function topics()
    {

    	return $this->hasMany('App\Topic');

    }

    public function templates()
    {

    	return $this->hasMany('App\Template');

    }  
}

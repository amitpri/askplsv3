<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Doctor extends Model
{
    public function topiccategories()
    {
  

    	return $this->morphMany('App\TopicCategory', 'topicable');

    }
 
}

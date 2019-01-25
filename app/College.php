<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    public function topiccategories()
    {
  

    	return $this->morphMany('App\TopicCategory', 'topicable');

    }
}

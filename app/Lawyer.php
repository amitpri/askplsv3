<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lawyer extends Model
{
    protected $casts = [ 
        'speciality' => 'array',
    ];

    public function topiccategories()
    {
  

    	return $this->morphMany('App\TopicCategory', 'topicable');

    }
}

<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShowTopicCategory extends Model
{
    protected $table = 'topic_categories';

    public function user()
    {

    	return $this->belongsTo('App\User');

    }

    public function getCreatedAtAttribute($value){

		return date('d-M-Y',strtotime($value));
	}
}

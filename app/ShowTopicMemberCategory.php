<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class ShowTopicMemberCategory extends Model
{
    protected $table = 'topic_category_members';

    protected $fillable = [

        'user_id', 'topicable_type' , 'topicable_id' , 'topic_name', 'type', 'url', 'status' , 'anonymous'
    ];

    public function user()
    {

    	return $this->belongsTo('App\User');

    }

    public function getCreatedAtAttribute($value){

		return date('d-M-Y',strtotime($value));
	}
}

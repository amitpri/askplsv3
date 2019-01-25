<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowReviewCategory extends Model
{
    protected $table = 'reviews';

    protected $fillable = [

        'user_id', 'topic_id', 'topic_name','review',
        
    ];

    public function getCreatedAtAttribute($value){

		return date('d-M-Y h:i A',strtotime($value));
	}
}

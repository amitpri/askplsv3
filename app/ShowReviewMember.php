<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowReviewMember extends Model
{
    protected $table = 'review_members';

    protected $fillable = [

        'user_id', 'topic_id',  'topic_categories_id' , 'topic_name','review',
        
    ];

    public function getCreatedAtAttribute($value){

		return date('d-M-Y h:i A',strtotime($value));
	}
}

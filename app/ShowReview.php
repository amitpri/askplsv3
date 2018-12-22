<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShowReview extends Model
{
    protected $table = 'reviews';

    protected $fillable = [

        'user_id', 'topic_id', 'topic_name','review',
        
    ];
}

<?php

namespace App;

use Auth; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TopicCategoryMembers extends Model
{
    
    protected $table = 'topic_category_members';

    public function review()
    {

        return $this->hasMany('App\Review');

    }


    public function topicable(){

        return $this->morphTo();
    }


    protected static function boot()
    {
        parent::boot();
         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            if( $loggedinemail != 'amitpri@gmail.com' ){

                $builder->where('topic_category_members.user_id', '=', $loggedinid);
            }

        });
    }
}
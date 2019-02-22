<?php

namespace App;

use Auth; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TopicCategory extends Model
{
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

            $loggedinrole = Auth::user()->role;
            
            if( $loggedinrole != 'super' ){

                $builder->where('topic_categories.user_id', '=', $loggedinid);
            }

        });
    }
}

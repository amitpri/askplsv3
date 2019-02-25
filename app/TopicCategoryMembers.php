<?php

namespace App;

use Auth; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TopicCategoryMembers extends Model
{
    
    protected $table = 'topic_category_members';

    public function reviewmember()
    {

        return $this->hasMany('App\ReviewMember' , 'topic_categories_id');

    }

    public function group()
    {

        return $this->belongsToMany('App\Group','topic_groups', 'topic_id'  );

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

                $builder->where('topic_category_members.user_id', '=', $loggedinid);
            }

        });
    }
}

<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TopicLog extends Model
{
    
    protected $table = 'topic_logs';

    protected $fillable = [
	       'user_id','topic_id','group_id','topic_name','group_title', 
	    ];

	protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;

            if( $loggedinrole != 'super' ){

                $builder->where('topic_logs.user_id', '=', $loggedinid);

            }

        });
    }
}

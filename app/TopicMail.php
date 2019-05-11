<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class TopicMail extends Model
{
    protected $table = 'topic_mails';

    protected $fillable = [
	       'user_id','topic_id','group_id','profile_id','emailid','mailkey',
	    ];

	protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;

            if( $loggedinrole != 'super' ){

                $builder->where('topic_mails.user_id', '=', $loggedinid);

            }

        });
    }
}	

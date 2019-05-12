<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    protected $fillable = [
        
           'user_id','topic_id','topic_categories_id','group_id','profile_id','emailid','mailkey', 'review', 'published','topic_name'
    ];

    public function topic()
    {

    	return $this->belongsTo('App\Topic');

    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;
            $loggedinrole = Auth::user()->role;

            if ( $loggedinrole == 'super' )  {

            }else{
                
                $builder->where('reviews.user_id', '=', $loggedinid);

            }

            

        });
    }    

}

<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Review extends Model
{
    protected $fillable = [
        
           'user_id','topic_id','group_id','profile_id','emailid','mailkey', 'review', 'published'
    ];

    public function topic()
    {

    	return $this->belongsTo('App\Topic', 'topic_id');

    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;

            if ( $loggedinemail == 'amitpri@gmail.com' ) {

            }else{
                
                $builder->where('reviews.user_id', '=', $loggedinid);

            }

            

        });
    }    

}

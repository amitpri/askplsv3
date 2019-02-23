<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Group extends Model
{
    public function profiles()
    {

    	return $this->belongsToMany('App\Profile','group_profiles');

    }

    public function topics()
    {

    	return $this->belongsToMany('App\Topic','topic_groups');

    }

    protected static function boot()
    {
        parent::boot();
         
        static::addGlobalScope('groups.user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
            
            if( $loggedinrole != 'super' ){
                 $builder->where('groups.user_id', '=', $loggedinid);

             }

        });
    }    
}

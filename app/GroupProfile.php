<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GroupProfile extends Model
{
    protected $fillable = [

        'group_id', 'profile_id' , 'user_id'
    ];

    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('group_profiles.user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
            
            if( $loggedinrole != 'super' ){
                $builder->where('group_profiles.user_id', '=', $loggedinid);
            }

        });
    }
}

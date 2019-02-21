<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Invite extends Model
{
    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

        	$loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
if( $loggedinrole != 'super' ){

            	$builder->where('invites.user_id', '=', $loggedinid);

            }

        });
    }
}

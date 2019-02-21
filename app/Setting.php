<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Setting extends Model
{
    protected $table = 'users';
     
    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('id', function (Builder $builder) {

            $loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
if( $loggedinrole != 'super' ){
            	
            	$builder->where('id', '=', $loggedinid);

            }

        });
    }    
}

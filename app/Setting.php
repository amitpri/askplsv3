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

            if( $loggedinemail != 'amitpri@gmail.com' ){
            	
            	$builder->where('id', '=', $loggedinid);

            }

        });
    }    
}

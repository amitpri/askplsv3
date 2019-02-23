<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
 
class Profile extends Model
{

    protected $fillable = [
	        
	    ];	
    
    public function group()
    {

    	return $this->belongsToMany('App\Group','group_profiles');

    }

    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
            
            if( $loggedinrole != 'super' ){


                $builder->where('profiles.user_id', '=', $loggedinid);

             }

        });
    }    
}

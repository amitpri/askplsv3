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

            if( $loggedinemail != 'amitpri@gmail.com' ){


                $builder->where('profiles.user_id', '=', $loggedinid);

             }

        });
    }    
}

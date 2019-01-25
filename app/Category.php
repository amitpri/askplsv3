<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    public function topics()
    {

    	return $this->hasMany('App\Topic');

    }

    public function templates()
    {

    	return $this->hasMany('App\Template');

    }

    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

            $loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;

            if( $loggedinemail != 'amitpri@gmail.com' ){
                
                $builder->where('status', '=', 1);

            }
            

        });
    }  
}

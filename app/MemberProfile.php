<?php

namespace App;

use Auth; 
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class MemberProfile extends Model
{
    
    protected $table = 'users'; 

    public function topicable(){

        return $this->morphTo();
    }


    protected static function boot()
    {
        parent::boot();
         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;

            $builder->where('users.role', '=', 'user'); 

        });
    }
}

<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class SchoolMember extends Model
{
 
    protected $table = 'schools';
 
 
    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

            $loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;
            $loggedintopicable_id = Auth::user()->topicable_id;
            $loggedintopicable_type = Auth::user()->topicable_type;

            if( $loggedintopicable_type == 'App\School' ){
                
                $builder->where('id', '=', $loggedintopicable_id);

            }else{

                $builder->where('id', '=', -1);
            }
            

        });
    } 
}

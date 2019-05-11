<?php

namespace App;

use Auth; 
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
 
use Illuminate\Database\Eloquent\Builder;

class TopicCompany extends Model
{
    use  Notifiable; 

    protected $casts = [
        'displayuptil' => 'datetime',
        'permissions' => 'array',
    ];
 

    public function group()
    {

    	return $this->belongsToMany('App\Group','topic_groups','topic_id','group_id');

    }

    public function review()
    {

    	return $this->hasMany('App\Review');

    }

    public function user()
    {

    	return $this->belongsTo('App\User', 'user_id');

    }    

    public function category()
    {

        return $this->belongsTo('App\Category', 'category_id');

    }  

    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;

            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
            
            if( $loggedinrole != 'super' ){

                $builder->where('topic_companies.user_id', '=', $loggedinid);
            }

        });
    }



}

<?php

namespace App;

use Auth; 
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
 
use Illuminate\Database\Eloquent\Builder;

class Topic extends Model
{
    use  Notifiable; 

    protected $casts = [
        'displayuptil' => 'datetime'
    ];

    public function group()
    {

    	return $this->belongsToMany('App\Group','topic_groups');

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

            if( $loggedinemail != 'amitpri@gmail.com' ){

                $builder->where('topics.user_id', '=', $loggedinid);
            }

        });
    }



}

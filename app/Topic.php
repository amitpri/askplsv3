<?php

namespace App;

use Auth; 
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;
 
use Illuminate\Database\Eloquent\Builder;

class Topic extends Model
{
    use  Notifiable;

    public function group()
    {

    	return $this->belongsToMany('App\Group','topic_groups');

    }

    public function review()
    {

    	return $this->hasMany('App\Review', 'id');

    }

    public function user()
    {

    	return $this->belongsTo('App\User', 'user_id');

    }    


    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

        	$loggedinid = Auth::user()->id;
            $builder->where('topics.user_id', '=', $loggedinid);

        });
    }



}

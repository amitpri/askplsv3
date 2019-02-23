<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Agent extends Model
{
    protected $table = 'users';

    public function category()
    {

        return $this->belongsTo('App\Category', 'category_id');

    } 

    public function city()
    {

        return $this->belongsTo('App\City', 'city_id');

    } 

    public function school()
    {

        return $this->hasMany('App\School','user_id');

    }

    protected static function boot()
    {
        parent::boot();

		static::addGlobalScope('user_id', function (Builder $builder) {

            $loggedinid = Auth::user()->id;
            $loggedinemail = Auth::user()->email;

            $loggedinrole = Auth::user()->role;
             
            $builder->where('role', '=', 'agent');
 

        });
    } 
}

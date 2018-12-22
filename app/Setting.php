<?php

namespace App;

use Auth;
use Illuminate\Notifications\Notifiable;  
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;


class Setting extends Model
{
     
    protected static function boot()
    {
        parent::boot();

         
        static::addGlobalScope('user_id', function (Builder $builder) {

            $loggedinid = Auth::user()->id;
            $builder->where('user_id', '=', $loggedinid);

        });
    }    
}

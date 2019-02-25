<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail; 
use App\ShowTopic;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable; 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','password_o', 'profile_photo' , 'user_code','phone'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'password_o','remember_token',
    ];

    public function topics()
    {
        return $this->hasMany('ShowTopic');
    }

    public function tenant()
    {

        return $this->belongsTo('App\Tenant', 'id');

    }  


    
}

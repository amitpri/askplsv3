<?php

namespace App\Policies;

use App\User;
use App\Setting;

use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

 
    public function __construct()
    {
        //
    }

    public function view(User $user, Setting $setting)
    {
        return 1 === 1;
    } 
    
    public function create(User $user)
    {
        return 1 === 1;
    }
 
    public function update(User $user, Setting $setting)
    {
        return 1 === 1;
    }
 
    public function delete(User $user, Setting $setting)
    {
        return 1 === 1;
    }
 
    public function restore(User $user, Setting $setting)
    {
        //
    }
 
    public function forceDelete(User $user, Setting $setting)
    {
        //
    }

    public function viewAny(User $user )
    {

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return $user->tenant > 0; 

        }
 

    }  
}

<?php

namespace App\Policies;

use App\User;
use App\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;
 
    public function __construct()
    {
        //
    } 

    public function view(User $user, Profile $profile)
    {
        return 1 === 1;
    } 
    
    public function create(User $user)
    {
        return 1 === 1;
    }
 
    public function update(User $user, Profile $profile)
    {
        return 1 === 1;
    }
 
    public function delete(User $user, Profile $profile)
    {
        return 1 === 1;
    }
 
    public function restore(User $user, Profile $profile)
    {
        //
    }
 
    public function forceDelete(User $user, Profile $profile)
    {
        //
    }

    public function viewAny(User $user )
    {

        return $user->tenant > 0; 

    }  
}

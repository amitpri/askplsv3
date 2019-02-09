<?php

namespace App\Policies;

use App\User;
use App\City;
use Illuminate\Auth\Access\HandlesAuthorization;

class CityPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, City $city)
    {
  
            return 1 === 1;
 
 
    } 
    
    public function create(User $user)
    {
 

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 1;
           
        }
    }
 
    public function update(User $user, City $city)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, City $city)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, City $city)
    {
        //
    }
 
    public function forceDelete(User $user, City $city)
    {
        //
    }

    public function viewAny(User $user )
    {
 

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }
 

    } 
}
<?php

namespace App\Policies;

use App\User;
use App\Lawyer;

use Illuminate\Auth\Access\HandlesAuthorization;

class LawyerPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, Lawyer $lawyer)
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
 
    public function update(User $user, Lawyer $lawyer)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, Lawyer $lawyer)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, Lawyer $lawyer)
    {
        //
    }
 
    public function forceDelete(User $user, Lawyer $lawyer)
    {
        //
    }

    public function viewAny(User $user )
    {
 

            return 1 == 1;
 

    } 
}


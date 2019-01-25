<?php

namespace App\Policies;

use App\User;
use App\FitnessCenter;
use Illuminate\Auth\Access\HandlesAuthorization;

class FitnessCenterPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, FitnessCenter $fitnesscenter)
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
 
    public function update(User $user, FitnessCenter $fitnesscenter)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, FitnessCenter $fitnesscenter)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, FitnessCenter $fitnesscenter)
    {
        //
    }
 
    public function forceDelete(User $user, FitnessCenter $fitnesscenter)
    {
        //
    }

    public function viewAny(User $user )
    {
 

            return 1 == 1;
 

    } 
}

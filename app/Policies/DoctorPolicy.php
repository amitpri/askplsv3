<?php

namespace App\Policies;

use App\User;
use App\Doctor;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, Doctor $doctor)
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
 
    public function update(User $user, Doctor $doctor)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, Doctor $doctor)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, Doctor $doctor)
    {
        //
    }
 
    public function forceDelete(User $user, Doctor $doctor)
    {
        //
    }

    public function viewAny(User $user )
    {
 

            return 1 == 1;
 

    } 
}
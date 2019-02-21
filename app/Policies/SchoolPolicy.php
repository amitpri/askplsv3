<?php

namespace App\Policies;

use App\User;
use App\School;

use Illuminate\Auth\Access\HandlesAuthorization;

class SchoolPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, School $school)
    {
  
            return 1 === 1;
 
 
    } 
    
    public function create(User $user)
    {
 

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 1;
           
        }
    }
 
    public function update(User $user, School $school)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, School $school)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, School $school)
    {
        //
    }
 
    public function forceDelete(User $user, School $school)
    {
        //
    }

    public function viewAny(User $user )
    {
 

            return 1 == 1;
 

    } 
}
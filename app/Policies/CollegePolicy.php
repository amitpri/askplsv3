<?php

namespace App\Policies;
use Auth;
use App\User;
use App\College;

use Illuminate\Auth\Access\HandlesAuthorization;

class CollegePolicy
{
    use HandlesAuthorization;
 
    public function __construct()
    {
        //
    }

    public function view(User $user, College $college)
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
 
    public function update(User $user, College $college)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, College $college)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, College $college)
    {
        //
    }
 
    public function forceDelete(User $user, College $college)
    {
        //
    }

    public function viewAny(User $user )
    {
 

            return 1 == 1;
 

    } 
}

<?php

namespace App\Policies;
use Auth;
use App\User;
use App\Company;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, Company $company)
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
 
    public function update(User $user, Company $company)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, Company $company)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, Company $company)
    {
        //
    }
 
    public function forceDelete(User $user, Company $company)
    {
        //
    }

    public function viewAny(User $user )
    {
 

            return 1 == 1;
 

    } 
}

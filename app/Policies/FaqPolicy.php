<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Faq;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, Faq $faq)
    {
  
        $loggedinrole = Auth::user()->role;
     if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 2;
           
        }
 
 
    } 
    
    public function create(User $user)
    {
 

        $loggedinrole = Auth::user()->role;
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 2;
           
        }
    }
 
    public function update(User $user, Faq $faq)
    {
        $loggedinrole = Auth::user()->role;
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, Faq $faq)
    {
        $loggedinrole = Auth::user()->role;
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, Faq $faq)
    {
        //
    }
 
    public function forceDelete(User $user, Faq $faq)
    {
        //
    }

    public function viewAny(User $user )
    {
 

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }
 

    } 
}
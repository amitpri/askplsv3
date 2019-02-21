<?php

namespace App\Policies;

use Auth;
use App\User;
use App\FaqCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class FaqCategoryPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, FaqCategory $faqcategory)
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
 
    public function update(User $user, FaqCategory $faqcategory)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, FaqCategory $faqcategory)
    {
        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, FaqCategory $faqcategory)
    {
        //
    }
 
    public function forceDelete(User $user, FaqCategory $faqcategory)
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
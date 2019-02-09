<?php

namespace App\Policies;

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
  
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 2;
           
        }
 
 
    } 
    
    public function create(User $user)
    {
 

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 2;
           
        }
    }
 
    public function update(User $user, Faq $faq)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }

          
    }
 
    public function delete(User $user, Faq $faq)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

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
 

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        { 

            return 1 == 2; 
        }
 

    } 
}
<?php

namespace App\Policies;
use Auth;
use App\User;
use App\Lawyer;
use App\CategoryAll;
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
 

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 1;
           
        }
    }
 
    public function update(User $user, Lawyer $lawyer)
    {
        $loggedinid = Auth::user()->id;
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
            if ( $lawyer->user_id == $loggedinid ) {

                return 1 == 1;
            }else{

                return 1 == 2;
            }
        }

          
    }
 
    public function delete(User $user, Lawyer $lawyer)
    {
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

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
 
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        $loggedintopicable_type = Auth::user()->topicable_type;

        if ( $loggedinrole == 'super' ) {

            return 1 === 1;

        }elseif( $loggedinrole == 'agent'  ){

            $loggedincategoryid = Auth::user()->category_id;

            $loggedincategoryname =  CategoryAll::find($loggedincategoryid)->category;

            if( $loggedincategoryname == 'Lawyers'){

                     return 1 === 1;

            }else{

                     return 1 === 2;
            }

           
        }elseif( $loggedintopicable_type == 'App\Company'){

            return 1 === 2;

        }else
        {
 
            return 1 === 1;
            
        }
 

    } 
}


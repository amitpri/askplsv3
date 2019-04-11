<?php

namespace App\Policies;
use Auth;
use App\User;
use App\College;
use App\CategoryAll;

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
        $loggedinid = Auth::user()->id;
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
            if ( $college->user_id == $loggedinid ) {

                return 1 == 1;
            }else{

                return 1 == 2;
            }
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
        
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        $loggedintopicable_type = Auth::user()->topicable_type;


        if ( $loggedinrole == 'super' ) {

            return 1 === 1;

        }elseif( $loggedinrole == 'agent'  ){

            $loggedincategoryid = Auth::user()->category_id;

            $loggedincategoryname =  CategoryAll::find($loggedincategoryid)->category;

            if( $loggedincategoryname == 'Colleges'){

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

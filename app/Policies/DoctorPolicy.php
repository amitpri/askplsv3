<?php

namespace App\Policies;
use Auth;
use App\User;
use App\Doctor;
use App\CategoryAll;
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
 

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 1;
           
        }
    }
 
    public function update(User $user, Doctor $doctor)
    {
        $loggedinid = Auth::user()->id;
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
            if ( $doctor->user_id == $loggedinid ) {

                return 1 == 1;
            }else{

                return 1 == 2;
            }
        }

          
    }
 
    public function delete(User $user, Doctor $doctor)
    {
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

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
 
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        $loggedintopicable_type = Auth::user()->topicable_type;


        if ( $loggedinrole == 'super' ) {

            return 1 === 1;

        }elseif( $loggedinrole == 'agent'  ){

            $loggedincategoryid = Auth::user()->category_id;

            $loggedincategoryname =  CategoryAll::find($loggedincategoryid)->category;

            if( $loggedincategoryname == 'Doctors'){

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
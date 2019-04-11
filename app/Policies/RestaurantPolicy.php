<?php

namespace App\Policies;
use Auth;
use App\User;
use App\Restaurant;
use App\CategoryAll;
use Illuminate\Auth\Access\HandlesAuthorization;

class RestaurantPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
        //
    }

    public function view(User $user, Restaurant $restaurant)
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
 
    public function update(User $user, Restaurant $restaurant)
    {
        $loggedinid = Auth::user()->id;
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
            if ( $restaurant->user_id == $loggedinid ) {

                return 1 == 1;
            }else{

                return 1 == 2;
            }
        }

          
    }
 
    public function delete(User $user, Restaurant $restaurant)
    {
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
           return 1 == 2; 
           
         }

          
    }
 
    public function restore(User $user, Restaurant $restaurant)
    {
        //
    }
 
    public function forceDelete(User $user, Restaurant $restaurant)
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

            if( $loggedincategoryname == 'Restaurants'){

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


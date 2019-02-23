<?php

namespace App\Policies;

use Auth;
use App\User;
use App\AgentRestaurant;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentRestaurantPolicy
{
    use HandlesAuthorization;

    public function view(User $user, AgentRestaurant $agentrestaurant)
    {
        $loggedinid = Auth::user()->id;

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
        return 1 === 2;
    }
    
    public function update(User $user, AgentRestaurant $agentrestaurant)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
            
        }else
        { 

            return 1 === 2; 
        }
    }

    public function viewAny(User $user )
    {

        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
            
        }else
        { 

            return 1 === 2; 
        }
 

    }

    
           
}

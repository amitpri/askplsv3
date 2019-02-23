<?php

namespace App\Policies;

use Auth;
use App\User;
use App\AgentHotel;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentHotelPolicy
{
    use HandlesAuthorization;

    public function view(User $user, AgentHotel $agenthotel)
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
    
    public function update(User $user, AgentHotel $agenthotel)
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

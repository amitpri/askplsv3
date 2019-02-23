<?php

namespace App\Policies;

use Auth;
use App\User;
use App\AgentCompany;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentCompanyPolicy
{
    use HandlesAuthorization;

    public function view(User $user, AgentCompany $agentcompany)
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
    
    public function update(User $user, AgentCompany $agentcompany)
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

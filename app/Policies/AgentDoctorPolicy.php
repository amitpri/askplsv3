<?php

namespace App\Policies;

use Auth;
use App\User;
use App\AgentDoctor;
use Illuminate\Auth\Access\HandlesAuthorization;

class AgentDoctorPolicy
{
    use HandlesAuthorization;

    public function view(User $user, AgentDoctor $agentdoctor)
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
    
    public function update(User $user, AgentDoctor $agentdoctor)
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

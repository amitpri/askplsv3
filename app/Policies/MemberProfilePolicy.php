<?php

namespace App\Policies;

use Auth;
use App\User;
use App\MemberProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class MemberProfilePolicy
{
    use HandlesAuthorization; 

    public function __construct()
    {
        //
    }
    public function view(User $user, MemberProfile $memberprofile)
    {
        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;

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
 
    public function update(User $user, MemberProfile $memberprofile)
    {
        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

            return 1 === 2;
            
        }
    }
 
    public function delete(User $user, MemberProfile $memberprofile)
    {
        
            return 1 === 2;
            
        
    }
 
    public function restore(User $user, MemberProfile $memberprofile)
    {
        //
    }
 
    public function forceDelete(User $user, MemberProfile $memberprofile)
    {
        //
    }

    public function viewAny(User $user)
    {

        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 
            return 1 === 2;
            
        }
    }  
 
}

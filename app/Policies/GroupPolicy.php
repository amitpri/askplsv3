<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Group;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, Group $group)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
            
        }else
        {

            if ( $group->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    } 
    
    public function create(User $group)
    {
        return 1 === 1;
    }
 
    public function update(User $user, Group $group)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $group->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function delete(User $user, Group $group)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;

        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $group->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function restore(User $user, Group $group)
    {
        //
    }
 
    public function forceDelete(User $user, Group $group)
    {
        //
    }

    public function viewAny(User $user )
    {

        $loggedinrole = Auth::user()->role;
        $loggedinpaid = Auth::user()->paid;
        $loggedintopicable_type = Auth::user()->topicable_type;
        
        if ( $loggedinrole == 'super' ) {

            return 1 == 1;

        }elseif( $loggedintopicable_type == 'App\Company' && $loggedinpaid == 1 ){

            return 1 == 1;

        }else{

            return 1 == 2;

        }


    } 
}

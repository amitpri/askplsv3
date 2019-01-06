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

        if ( $user->email == 'amitpri@gmail.com' ) {

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
        return 1 === 1;
    }
 
    public function delete(User $user, Group $group)
    {
        return 1 === 1;
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

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return $user->tenant > 0; 

        }


    } 
}

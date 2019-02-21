<?php

namespace App\Policies;

use Auth;
use App\User;
use App\TenantUser;
use Illuminate\Auth\Access\HandlesAuthorization;

class TenantUserPolicy
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

    public function view(User $user, TenantUser $tenantuser)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $tenantuser->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }

    /**
     * Determine whether the user can create reviews.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return 1 === 1;
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function update(User $user, TenantUser $tenantuser)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $tenantuser->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function delete(User $user, TenantUser $tenantuser)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $tenantuser->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }

    /**
     * Determine whether the user can restore the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function restore(User $user, TenantUser $tenantuser)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function forceDelete(User $user, TenantUser $tenantuser)
    {
        //
    }

    public function viewAny(User $user)
    {

        return $user->role == 'super'; 

    }  
 

}

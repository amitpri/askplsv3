<?php

namespace App\Policies;

use Auth;
use App\User;
use App\GroupProfile;
use Illuminate\Auth\Access\HandlesAuthorization;

class GroupProfilePolicy
{
    use HandlesAuthorization;

    public function view(User $user, GroupProfile $groupprofile)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $groupprofile->user_id == $loggedinid ) {

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
        return 1 === 2;
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function update(User $user, GroupProfile $groupprofile)
    {
        return 1 === 2;
    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function delete(User $user, GroupProfile $groupprofile)
    {
        return 1 === 2;
    }

    /**
     * Determine whether the user can restore the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function restore(User $user, GroupProfile $groupprofile)
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
    public function forceDelete(User $user, GroupProfile $groupprofile)
    {
        //
    }

    public function viewAny(User $user )
    {

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 == 1;

        }else{

            return $user->tenant > 0; 

        }
 

    }
}

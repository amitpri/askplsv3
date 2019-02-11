<?php

namespace App\Policies;

use Auth;
use App\User;
use App\ReviewMember;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewMemberPolicy
{
    use HandlesAuthorization;

    public function view(User $user, ReviewMember $reviewmember)
    {
  
        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        {

            if ( $paid == 1 ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }

    }
 
    public function create(User $user)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 2;

        }else{

            return 1 == 2; 

        }
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function update(User $user, ReviewMember $reviewmember)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 2;

        }else{

            return 1 == 2;

        }
    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function delete(User $user, ReviewMember $reviewmember)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return 1 == 2; 

        }
    }

    /**
     * Determine whether the user can restore the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function restore(User $user, ReviewMember $review)
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
    public function forceDelete(User $user, ReviewMember $reviewmember)
    {
        //
    }

    public function viewAny(User $user )
    {

        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        {

            if ( $paid == 1 ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }

    }
}

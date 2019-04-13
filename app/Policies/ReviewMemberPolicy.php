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

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

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
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 == 2;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

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
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 == 2;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

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
        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 == 1;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else{

            return 1 == 2; 

        }
    }
 
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

        $loggedinrole = Auth::user()->role;
        $loggedintopicable_type = Auth::user()->topicable_type;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
            
        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }elseif( $loggedintopicable_type == 'App\Company'){

            return 1 === 2;

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

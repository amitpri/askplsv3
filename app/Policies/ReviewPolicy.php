<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Review;
use Illuminate\Auth\Access\HandlesAuthorization;

class ReviewPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Review $review)
    {
  
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else
        {

            if ( $review->user_id == $loggedinid ) {

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
        $loggedinrole = Auth::user()->role;

        if ( $loggedinrole == 'super' ) {

            return 1 == 1;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else{

            return $user->tenant > 0; 

        }
    }

    /**
     * Determine whether the user can update the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function update(User $user, Review $review)
    {
        $loggedinrole = Auth::user()->role;

        if ( $loggedinrole == 'super' ) {

            return 1 == 1;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else{

            return $user->tenant > 0; 

        }
    }

    /**
     * Determine whether the user can delete the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function delete(User $user, Review $review)
    {
        $loggedinrole = Auth::user()->role;

        if ( $loggedinrole == 'super' ) {

            return 1 == 1;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else{

            return $user->tenant > 0; 

        }
    }

    /**
     * Determine whether the user can restore the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function restore(User $user, Review $review)
    {
        //
    }
 
    public function forceDelete(User $user, Review $review)
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


             return 1 === 1;

        }

    }
}

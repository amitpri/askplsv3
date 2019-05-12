<?php

namespace App\Policies;

use Auth;
use App\User;
use App\TopicMail;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicMailPolicy
{
    use HandlesAuthorization;

    public function view(User $user, TopicMail $topicmail)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;

        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        
        }else
        {

            if ( $topicmail->user_id == $loggedinid ) {

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
    public function update(User $user, TopicMail $topicmail)
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
    public function delete(User $user, TopicMail $topicmail)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $topicmail->user_id == $loggedinid ) {

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
    public function restore(User $user, TopicMail $topicmail)
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
    public function forceDelete(User $user, TopicMail $topicmail)
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

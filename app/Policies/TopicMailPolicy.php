<?php

namespace App\Policies;

use App\User;
use App\TopicMail;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicMailPolicy
{
    use HandlesAuthorization;

    public function view(User $user, TopicMail $topicmail)
    {
        return 1 === 1;
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
        return 1 === 1;
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

        return $user->tenant > 0; 

    }
}

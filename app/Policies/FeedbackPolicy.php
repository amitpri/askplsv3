<?php

namespace App\Policies;

use App\User;
use App\Feedback;
use Illuminate\Auth\Access\HandlesAuthorization;

class FeedbackPolicy
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
 
    public function view(User $user, Feedback $feedback)
    {
        return 1 === 2;
    }
    
    public function update(User $user, Feedback $feedback)
    {
        return 1 === 1;
    }
}

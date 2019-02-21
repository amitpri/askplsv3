<?php

namespace App\Policies;

use Auth;
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
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $feedback->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
    
    public function update(User $user, Feedback $feedback)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $feedback->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
}

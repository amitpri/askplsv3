<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Order;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Order $order)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

                return 1 === 2;
            
        }
    }
 
    public function create(User $user)
    {
        return 1 === 2;
    }

    public function update(User $user, Order $order)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        { 

                return 1 === 2;
            
        }
    }
 
    public function delete(User $user, Order $order)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {
 
            return 1 === 2;
             
        }
    }

    /**
     * Determine whether the user can restore the review.
     *
     * @param  \App\User  $user
     * @param  \App\Review  $review
     * @return mixed
     */
    public function restore(User $user, Order $order)
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
    public function forceDelete(User $user, Order $order)
    {
        //
    }

    public function viewAny(User $user )
    {

        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {
 
            return 1 === 2;
             
        }

    }
}

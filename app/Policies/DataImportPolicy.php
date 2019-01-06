<?php

namespace App\Policies;

use Auth;
use App\User;
use App\DataImport;
use Illuminate\Auth\Access\HandlesAuthorization;

class DataImportPolicy
{
    use HandlesAuthorization;

    public function view(User $user, DataImport $dataimport)
    {
        return 1 === 2;
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
    public function update(User $user, DataImport $dataimport)
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
    public function delete(User $user, DataImport $dataimport)
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
    public function restore(User $user, DataImport $dataimport)
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
    public function forceDelete(User $user, DataImport $dataimport)
    {
        //
    }

    public function viewAny(User $user )
    {

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return $user->tenant > 0; 

        }


    }
   
}

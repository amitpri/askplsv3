<?php

namespace App\Policies;

use App\User;
use App\Account;
use Illuminate\Auth\Access\HandlesAuthorization;

class AccountPolicy
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
 
    public function view(User $user, Account $account)
    {
        return 1 === 1;
    }
    
    public function update(User $user, Account $account)
    {
        return 1 === 1;
    }

    public function viewAny(User $user )
    {

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return 1 == 1;

        }
 

    }

    
           
}

<?php

namespace App\Policies;

use App\User;
use App\ContactForm;
use Illuminate\Auth\Access\HandlesAuthorization;

class ContactFormPolicy
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

    public function view(User $user, ContactForm $contactform)
    {

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        {
            return 1 === 2;
        }
 
    } 
    
    public function create(User $user)
    {
 
            return 1 == 2;
 
    }
 
    public function update(User $user, ContactForm $contactform)
    {
 

            return 1 == 2;
 
    }
 
    public function delete(User $user, ContactForm $contactform)
    {
 

            return 1 == 2;
 
    }
 
    public function restore(User $user, ContactForm $contactform)
    {
        //
    }
 
    public function forceDelete(User $user, ContactForm $contactform)
    {
        //
    }

    public function viewAny(User $user )
    { 

        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 === 1;
        }else
        {
            return 1 === 2;
        }
 
 

    } 
}

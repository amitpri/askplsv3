<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Template;

use Illuminate\Auth\Access\HandlesAuthorization;

class TemplatePolicy
{
    use HandlesAuthorization;
 
    public function __construct()
    {
        //
    }

    public function view(User $user, Template $template)
    {
 
        return 1 === 1;
 
    } 
    
    public function create(User $user)
    {
        
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return 1 == 2;

        }

    }
 
    public function update(User $user, Template $template)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return 1 == 2;

        }
    }
 
    public function delete(User $user, Template $template)
    {
        if ( $user->email == 'amitpri@gmail.com' ) {

            return 1 == 1;

        }else{

            return 1 == 2;

        }
    }
 
    public function restore(User $user, Template $template)
    {
        //
    }
 
    public function forceDelete(User $user, Template $template)
    {
        //
    }

    public function viewAny(User $user )
    { 

        return 1 == 1;
 
 

    } 
}

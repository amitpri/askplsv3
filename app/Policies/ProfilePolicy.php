<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Profile;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProfilePolicy
{
    use HandlesAuthorization;
 
    public function __construct()
    {
        //
    } 

    public function view(User $user, Profile $profile)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $profile->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    } 
    
    public function create(User $user)
    {
        return 1 === 1;
    }
 
    public function update(User $user, Profile $profile)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $profile->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function delete(User $user, Profile $profile)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $profile->user_id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function restore(User $user, Profile $profile)
    {
        //
    }
 
    public function forceDelete(User $user, Profile $profile)
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

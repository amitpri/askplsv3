<?php

namespace App\Policies;

use Auth;
use App\User;
use App\TopicCategoryMembers;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicCategoryMembersPolicy
{
    use HandlesAuthorization; 

    public function __construct()
    {
        //
    }
    public function view(User $user, TopicCategoryMembers $topiccategorymembers)
    {
        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $paid == 1 ) {

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
 
    public function update(User $user, TopicCategoryMembers $topiccategorymembers)
    {
        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $paid == 1 ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function delete(User $user, TopicCategoryMembers $topiccategorymembers)
    {
        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }else
        {

            if ( $paid == 1 ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function restore(User $user, TopicCategoryMembers $topiccategorymembers)
    {
        //
    }
 
    public function forceDelete(User $user, TopicCategoryMembers $topiccategorymembers)
    {
        //
    }

    public function viewAny(User $user)
    {

        $loggedinid = Auth::user()->id;
        $paid = Auth::user()->paid;
        $topicable_id = Auth::user()->topicable_id;
        $topicable_type = Auth::user()->topicable_type;
        $loggedintopicable_type = Auth::user()->topicable_type;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }elseif( $loggedintopicable_type == 'App\Company'){

            return 1 === 2;

        }else
        {

            if ( $paid == 1 ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }  
 
}

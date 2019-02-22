<?php

namespace App\Policies;

use Auth;
use App\User;
use App\TopicCategory;
use Illuminate\Auth\Access\HandlesAuthorization;

class TopicCategoryPolicy
{
    use HandlesAuthorization; 

    public function __construct()
    {
        //
    }
    public function view(User $user, TopicCategory $topiccategory)
    { 

            return 1 === 1; 
    }
 
    public function create(User $user)
    {
        return 1 === 1;
    }
 
    public function update(User $user, TopicCategory $topiccategory)
    {
        return 1 === 1; 
    }
 
    public function delete(User $user, TopicCategory $topiccategory)
    {
       return 1 === 1; 
    }
 
    public function restore(User $user, TopicCategory $topiccategory)
    {
        //
    }
 
    public function forceDelete(User $user, TopicCategory $topiccategory)
    {
        //
    }

    public function viewAny(User $user)
    {

        $loggedinid = Auth::user()->id; 

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else
        {
  
                return 1 === 1;
           
        }
    }  
 
}

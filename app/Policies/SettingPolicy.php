<?php

namespace App\Policies;

use Auth;
use App\User;
use App\Setting;

use Illuminate\Auth\Access\HandlesAuthorization;

class SettingPolicy
{
    use HandlesAuthorization;

 
    public function __construct()
    {
        //
    }

    public function view(User $user, Setting $setting)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;

        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }
        else
        {

            if ( $setting->id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    } 
    
    public function create(User $user)
    {
        
        $loggedinid = Auth::user()->id;

        $setting = Setting::where('id' , '=' , $loggedinid)->first(['id']);

        if( isset($setting)){

            return 1 === 2;

        }else{

            return 1 === 1;

        }

        


    }
 
    public function update(User $user, Setting $setting)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else
        {

            if ( $setting->id == $loggedinid ) {

                return 1 === 1;

            }else{

                return 1 === 2;
            }
        }
    }
 
    public function delete(User $user, Setting $setting)
    {
        $loggedinid = Auth::user()->id;

        $loggedinrole = Auth::user()->role;
        
        if ( $loggedinrole == 'super' ) {

            return 1 === 1;
        }elseif( $loggedinrole == 'agent'  ){

            return 1 === 2;

        }else
        {
 

                return 1 === 2;
            
        }
    }
 
    public function restore(User $user, Setting $setting)
    {
        //
    }
 
    public function forceDelete(User $user, Setting $setting)
    {
        //
    }

    public function viewAny(User $user )
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

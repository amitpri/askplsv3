<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
 
 
use Laravel\Nova\Fields\Number;

use Laravel\Nova\Fields\Select;

use Outhebox\NovaHiddenField\HiddenField;
use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Http\Requests\NovaRequest;
use OwenMelbz\RadioField\RadioButton;

use Laravel\Nova\Fields\Timezone;


class Setting extends Resource
{

    public static $group = "Personal";

    public static $model = 'App\\Setting';
 
    public static $title = 'name';
 
    public static $search = [

        'id', 'name', 'email', 
    ];

    
    public function fields(Request $request)
    {
        $loggedinemail= Auth::user()->email;
        $loggedinrole = Auth::user()->role;
        
        if( $loggedinrole == "super"){

           return [

                ID::make()->sortable(),

                RadioButton::make('Notification - Reply', 'notification_reply')
                ->options([
                    'Yes' => 'Yes',
                    'No' => 'No',
                ])->default('Yes')->sortable(),

                Select::make('Language', 'language')->options([
                    'English' => 'English', 
                ])->sortable(), 

                Timezone::make('Time Zone', 'timezone'),
     

            ]; 

        }else{


            return [

                ID::make()->sortable()->hideFromIndex(), 

                RadioButton::make('Notification - Reply', 'notification_reply')
                ->options([
                    'Yes' => 'Yes',
                    'No' => 'No',
                ])->default('Yes')->sortable(),

                Select::make('Language', 'language')->options([
                    'English' => 'English', 
                ])->sortable(), 

                Timezone::make('Time Zone', 'timezone'),
     

            ];

        }
        
    }

 
    public function cards(Request $request)
    {
        return [];
    }

 
    public function filters(Request $request)
    {
        return [
            
        ];
    }

 
    public function lenses(Request $request)
    {
        return [];
    }

 
    public function actions(Request $request)
    {
        return [];
    }
}

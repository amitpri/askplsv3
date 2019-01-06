<?php

namespace App\Nova;

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

    public static $group = "Setting";

    public static $model = 'App\\Setting';
 
    public static $title = 'name';
 
    public static $search = [

        'id', 'name', 'email', 
    ];

    
    public function fields(Request $request)
    {
        return [

            ID::make()->sortable()->hideFromIndex(),

            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex(),

            RadioButton::make('Notification - Reply', 'notification_reply')
            ->options([
                'Yes' => 'Yes',
                'No' => 'No',
            ])->default('Private')->sortable(),

            Select::make('Language', 'language')->options([
                'English' => 'English', 
            ])->sortable(), 

            Timezone::make('Time Zone', 'timezone'),
 

        ];
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

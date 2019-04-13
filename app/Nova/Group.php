<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;

use Laravel\Nova\Fields\Textarea;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest; 

use App\Nova\Metrics\GroupCount; 

use Laravel\Nova\Fields\BelongsToMany;

use Outhebox\NovaHiddenField\HiddenField;

class Group extends Resource
{
 
    public static $group = 'Company';

    public static $displayInNavigation = true;

    public static $model = 'App\Group';
 
    public static $title = 'title';
 
    public static $search = [
        'id', 'title'
    ];
 
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),
 
            Text::make('Title')->sortable()->rules('required', 'max:255'),

            Textarea::make('Body')->rows(10),
 
            BelongsToMany::make('Profiles'),

            BelongsToMany::make('Topics')
        ];
    }

 
    public function cards(Request $request)
    {
        return [
 

        ];
    }
 
    public function filters(Request $request)
    {
        return [];
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

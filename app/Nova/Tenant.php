<?php

namespace App\Nova;
 
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\Text;
use Outhebox\NovaHiddenField\HiddenField;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;

class Tenant extends Resource
{
    public static $group = "0.Admin";
    
    public static $displayInNavigation = false;
     
    public static $model = 'App\Tenant';

 
    public static $title = 'id';

 
    public static $search = [
        'id',
    ];

 
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),  

            Text::make('workspace')->sortable()->rules('required', 'max:100'),

            Text::make('company')->sortable()->rules('required', 'max:100'),

            Text::make('city')->sortable()->rules('required', 'max:100'),

            Text::make('url')->sortable()->rules('required', 'max:100'), 

            Text::make('code')->sortable()->rules('required', 'max:100'), 

            BelongsToMany::make('User'), 
        ];
    }

    public function cards(Request $request)
    {
        return [];
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

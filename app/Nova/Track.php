<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime; 
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Track extends Resource
{
    public static $group = '0.Admin';
    public static $model = 'App\Track';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];
 
    public function fields(Request $request)
    {
        return [ 

                    ID::make()->sortable(),   

                    DateTime::make('Created At')->sortable(),

                    Text::make('User Id','user_id')->sortable(),    

                    Text::make('Name','user_name')->sortable(),    

                    Text::make('Email','user_email')->sortable(),    

                    Text::make('IP','ipaddress')->sortable(),    

                    Text::make('Page','page')->sortable(),    

                    Text::make('URL','url')->sortable(),    

                    Text::make('Type','type')->sortable(),    

                    Text::make('Referrer','referrer')->sortable(), 

                    
                ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}

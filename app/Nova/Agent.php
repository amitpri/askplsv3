<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Agent extends Resource
{
    public static $group = "0.Agent";

    public static $model = 'App\Agent'; 

    public static $title = 'name';
 
    public static $search = [
        'id',
    ];
 
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;
        $loggedinrole = Auth::user()->role;

        if( $loggedinrole == "super"){

            return [
                    ID::make()->sortable(), 

                    HasMany::make('School'),

                    Text::make('Id')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('User Code')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('Name')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('Email')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('Role'), 

                    BelongsTo::make('Category')->rules('required', 'max:100'),

                    BelongsTo::make('City')->rules('required', 'max:100'),
                        
 
                ];

        }else{
             
                return [
                    ID::make()->sortable(), 
    
                ];
            }
        
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

<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
 
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\HasMany;

use Laravel\Nova\Http\Requests\NovaRequest;

class AgentLawyer extends Resource
{
    public static $group = "0.Agent";

    public static $model = 'App\AgentLawyer';
 
    public static $title = 'id';
 
    public static $search = [
        'id',
    ];

    public static function label() {

        return 'Agent - Lawyer';

    }

 
    public function fields(Request $request)
    {
        return [

            HasMany::make('Agent'),

            BelongsTo::make('Agent'),
 
            Text::make('Id')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]])->sortable(), 

            Text::make('Lawyer Name','name')->sortable()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),  

            Text::make('Locality')->hideFromIndex()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]), 
            Text::make('City')->rules('required', 'max:100')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]])->sortable(),  
            Text::make('Country')->hideFromIndex()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),  

        ];
    }

 
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

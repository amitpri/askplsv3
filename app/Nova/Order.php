<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text; 

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Order extends Resource
{
    public static $group = "0.Admin";
    public static $model = 'App\Order';

 
    public static $title = 'id';

 
    public static $search = [
        'id',
    ];

 
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('User Id')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
            Text::make('Name')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
            Text::make('Order Id')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
            Text::make('Transaction Id')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
            Text::make('Status')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
            Text::make('Plan')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
            Text::make('Price')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),
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

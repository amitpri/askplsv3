<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Outhebox\NovaHiddenField\HiddenField;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Job extends Resource
{
    
    public static $group = '0.Admin';

    public static $displayInNavigation = false;

    public static $model = 'App\Job';

    public static function label() {

        return 'Pending Jobs';

    }

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

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),        

            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),   

            Text::make('Queue', 'queue'),            

            Text::make('Reserved At', 'reserved_at')->sortable(),

            Text::make('Available At', 'available_at')->sortable(),

            DateTime::make('Created At')->sortable(),

            Text::make('Attempts', 'attempts')->sortable()->hideFromIndex()->hideFromDetail(),
 
            Text::make('Payload')->sortable()->rules('required', 'max:255'), 
            
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

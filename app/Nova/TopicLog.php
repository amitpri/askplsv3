<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\DateTime;
use Outhebox\NovaHiddenField\HiddenField;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class TopicLog extends Resource
{
     
    public static $group = 'Logs';

    public static $model = 'App\TopicLog';

    public static $displayInNavigation = true;

    public static function label() {

        return 'Topic Logs';

    }

    public static function uriKey() :string
    {
        return 'topic_logs';
    }

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

            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

            Text::make('Topic Id', 'topic_id')->sortable()->hideFromIndex()->hideFromDetail(),

            Text::make('Topic Name')->sortable()->rules('required', 'max:255'), 

            Text::make('Group Id', 'group_id')->sortable()->hideFromIndex()->hideFromDetail(),
 
            Text::make('Group Title')->sortable()->rules('required', 'max:255'),  

            DateTime::make('Created At')->sortable(),
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

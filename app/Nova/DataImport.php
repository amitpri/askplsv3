<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Outhebox\NovaHiddenField\HiddenField;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class DataImport extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $group = "Company";

    public static $displayInNavigation = true;

    public static $model = 'App\DataImport';

    public static function label() {

        return 'Data Imports';

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

    public static function searchable()
    {
        return false;
    }

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
        return [

            new \Sparclex\NovaImportCard\NovaImportCard(\App\Nova\Profile::class),
            new \Sparclex\NovaImportCard\NovaImportCard(\App\Nova\Group::class),
            new \Sparclex\NovaImportCard\NovaImportCard(\App\Nova\GroupProfile::class),

        ];
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

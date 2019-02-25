<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Outhebox\NovaHiddenField\HiddenField;

class GroupProfile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $group = '0.Company';

    public static $displayInNavigation = true;

    public static $model = 'App\GroupProfile';

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
            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex(),
            Text::make('Group Id', 'group_id')->sortable(),
            Text::make('Profile Id', 'profile_id')->sortable(),
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

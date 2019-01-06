<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Outhebox\NovaHiddenField\HiddenField;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Review extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $group = 'Reviews';
    

    public static $model = 'App\Review';

 
    public static $title = 'id';

 

 
    public static $search = [

        'id', 'topic_name' , 'review'

    ];

 
    public function fields(Request $request)
    {

        return [
            ID::make()->sortable(),
            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),
            Text::make('Topic Name')->sortable(),
            Text::make('Review')
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

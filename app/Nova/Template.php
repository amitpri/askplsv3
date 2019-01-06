<?php

namespace App\Nova;

use Jackabox\DuplicateField\DuplicateField;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use OwenMelbz\RadioField\RadioButton;

use Sixlive\TextCopy\TextCopy;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class Template extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $group = 'Reviews';

    public static $model = 'App\Template';

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

            TextCopy::make('Topic Name'), 

            TextCopy::make('Details')->help(
                        "<i>" . 'Details or links of the topics to be reviewed. Max length 4000 characters'  ."<i>"
                    ), 
            DuplicateField::make('Duplicate')
            ->withMeta([
                'resource' => 'topics', // resource url
                'model' => 'App\Template', // model path
                'id' => $this->id, // id of record 
                'relations' => ['one', 'two'] 
            ]),
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

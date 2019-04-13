<?php

namespace App\Nova;

use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Fields\Textarea;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;
 
use Laravel\Nova\Fields\BelongsToMany;

use Outhebox\NovaHiddenField\HiddenField;

class Profile extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $group = 'Company';
    
    public static $displayInNavigation = true;

    public static $model = 'App\Profile';

    public static $title = 'emailid';

    public static $search = [

        'id', 'profile_id' , 'name', 'emailid' , 'phone'
    ];

 
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

            Text::make('Profile Id', 'profile_id')->sortable(),

            Text::make('Name')->sortable()->rules('required', 'max:255'),

            Text::make('Email Id','emailid')
                ->sortable()
                ->rules('required' , 'email', 'max:255'),
          //      ->rules('unique:profiles,emailid,NULL,id'),
          //      ->creationRules('unique:profiles,emailid'),

            Text::make('Phone')->sortable(),

            Textarea::make('Notes'),

            BelongsToMany::make('Group')
        ];
    }

 
    public function cards(Request $request)
    {
        return [
 

        ];
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
        return [

            new DownloadExcel,

        ];
    }
}

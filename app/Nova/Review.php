<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Trix;
use Outhebox\NovaHiddenField\HiddenField;
use Laravel\Nova\Fields\DateTime;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

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

        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;

        if( $loggedinemail == "amitpri@gmail.com"){

            return [
                ID::make()->sortable(), 
                Text::make('Topic Name')->sortable(),
                Text::make('Review'),
                DateTime::make('Created at')->format('DD MMM YYYY, LT')->sortable()
            ];
        }else{

            return [ 
                Text::make('Topic Name')->sortable(),
                Text::make('Review'),
                DateTime::make('Created at')->format('DD MMM YYYY, LT')->sortable()
            ];

        }

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
         return [

            new DownloadExcel, 
        ];
    }
}

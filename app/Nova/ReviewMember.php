<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\TextArea;

use Laravel\Nova\Fields\Trix;
use Outhebox\NovaHiddenField\HiddenField;
use Laravel\Nova\Fields\DateTime;
use Saumini\EllipsisTextarea\EllipsisTextarea;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Maatwebsite\LaravelNovaExcel\Actions\DownloadExcel;

class ReviewMember extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */

    public static $group = '2.Reviews';
    

    public static $model = 'App\ReviewMember';

 
    public static $title = 'id';
 
    public static $search = [

         'topic_name' , 'review'

    ];

    public static function label() {

        return 'Review - Members';

    }

 
    public function fields(Request $request)
    {

        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;
        $loggedinrole = Auth::user()->role;

        if( $loggedinrole == "super"){

            return [
                ID::make()->sortable(), 
                Text::make('Topic Name')->sortable(), 
                EllipsisTextarea::make('Review')->displayLength(100),
                DateTime::make('Created at')->format('DD MMM YYYY, LT')->sortable()
            ];
        }else{

            return [ 
                Text::make('Topic Name')->sortable(),
                EllipsisTextarea::make('Review')->displayLength(100),
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

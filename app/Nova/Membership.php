<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text; 
use Laravel\Nova\Fields\Number;
use Outhebox\NovaHiddenField\HiddenField;
use OwenMelbz\RadioField\RadioButton;
use Laravel\Nova\Fields\MorphTo;

use Laravel\Nova\Resource as NovaResource;
use Laravel\Nova\Http\Requests\NovaRequest;

class Membership extends Resource
{
     

    public static $group = "0.Admin";

    public static $model = 'App\\Membership';  

    public static $title = 'name';
 
    public static $search = [

        'id', 'name', 'email', 'user_code' ,'phone' ,'paid','topicable_type'
    ];
  

    public function fields(Request $request)
    {
        return [
            ID::make()->sortable()->sortable(), 

            MorphTo::make('Topicable')->types([
                        Doctor::class,
                        Hotel::class,
                        Company::class,
                        Lawyer::class,
                        School::class,
                        College::class,
                        Restaurant::class,
                        FitnessCenter::class,
                    ])->searchable(),

            Text::make('user_code')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]]),

            Text::make('Name')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),

            Text::make('Email') 
                ->rules('required', 'email', 'max:254')
                ->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),

            Number::make('phone')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->sortable(),

            Number::make('phone2')->withMeta(['extraAttributes' => [
                          'readonly' => true
                    ]])->hideFromIndex(),   

            RadioButton::make('Paid')
                    ->options([ 
                        '1' => 'Paid',
                        '0' => 'Not Paid',
                    ])->sortable(), 
        ];
    }
 
   
 
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
        return [
            
        ];
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

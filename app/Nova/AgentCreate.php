<?php

namespace App\Nova;

use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\BelongsTo;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

class AgentCreate extends Resource
{
    public static $group = "0.Agent";

    public static $model = 'App\AgentCreate'; 

    public static $title = 'name';
 
    public static $search = [
        'id', 'email', 'name' ,'role', 'user_code'
    ];

    public static function label() {

        return 'Agent - Create';

    }
 
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;
        $loggedinrole = Auth::user()->role;

        if( $loggedinrole == "super"){

            return [
                    ID::make()->sortable(), 

                    Text::make('Id')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]])->sortable(), 

                    Text::make('User Code')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('Name')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]])->sortable(), 

                    Text::make('Email')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]])->sortable(), 

                    Text::make('Role')->sortable(), 

                    BelongsTo::make('Category')->rules('required', 'max:100'),

                    BelongsTo::make('City')->rules('required', 'max:100'),
                        
 
                ];

        }else{
             
                return [
                    ID::make()->sortable(), 
    
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
        return [];
    }
}

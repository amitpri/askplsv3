<?php

namespace App\Nova;
 
use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\Select;

use Laravel\Nova\Fields\BelongsToMany;

use Laravel\Nova\Fields\HasMany;

use App\Nova\Actions\EmailTopicGroup;
use App\Nova\Actions\TestAction;

use Outhebox\NovaHiddenField\HiddenField;

use OwenMelbz\RadioField\RadioButton;

use Spatie\TagsField\Tags;

class Topic extends Resource
{ 

    public static $group = '2.Reviews';
    
    public static $model = 'App\Topic';
 
    public static $title = 'topic_name';

    public static $search = [
        
        'id', 'topic_name' , 'type'
    ];
  
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 

        if( $loggedintenant == 0 ){

            return [
                ID::make()->sortable()->hideFromIndex(), 

                HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

                Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                        ->help(
                            'The heading of the review being asked for. Max length 100'
                        ), 

                Textarea::make('Details')->rows(10)->rules('required', 'max:4000')->help(
                            "<i>" . 'Details or links of the topics to be reviewed. Max length 4000 characters'  ."<i>"
                        ), 

                RadioButton::make('Type')
                ->options([ 
                    'Public' => 'Public',
                ])->default('Public')->sortable()->help(
                            "<br><br><i>" . 'Public Topics are displayed at askpls.com and can be reviewed by anybody'  ."<i>"
                        ), 

                RadioButton::make('Category')
                ->options([ 
                    'Personal' => 'Personal',
                    'HR' => 'HR',
                    'Sales' => 'Sales',
                    'Marketing' => 'Marketing',
                    'Operation' => 'Operation',
                    'Technology' => 'Technology',
                ])->sortable()->default('Personal'),

                HiddenField::make( 'url')->default('https://askpls.com/topics/' . str_random(10))->hideFromIndex()->hideFromDetail(),
      
                Text::make('Public URL' ,function(){

                    if ( $this->type == 'Public'){

                        return $this->url;
                    }

                }),

                

          //      Tags::make('Tags')->withoutSuggestions()->hideFromIndex(), 

                HasMany::make('Review')
            ];
        }else{

            return [
                ID::make()->sortable()->hideFromIndex(), 

                HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

                Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                        ->help(
                            'The heading of the review being asked for. Max length 100'
                        ), 

                Textarea::make('Details')->rows(10)->rules('required', 'max:4000')->help(
                            "<i>" . 'Details or links of the topics to be reviewed. Max length 4000 characters'  ."<i>"
                        ), 

                RadioButton::make('Type')
                ->options([
                    'Private' => 'Private',
                    'Public' => 'Public',
                ])->default('Private')->sortable()->help(
                            "<br><br><i>" . 'Public Topics are displayed at askpls.com and can be reviewed by anybody'  ."<i>"
                        ), 

                RadioButton::make('Category')
                ->options([ 
                    'Personal' => 'Personal',
                    'HR' => 'HR',
                    'Sales' => 'Sales',
                    'Marketing' => 'Marketing',
                    'Operation' => 'Operation',
                    'Technology' => 'Technology',
                ])->sortable()->default('Personal'),

                HiddenField::make( 'url')->default('https://askpls.com/topics/' . str_random(10))->hideFromIndex()->hideFromDetail(),
      
                Text::make('Public URL' ,function(){

                    if ( $this->type == 'Public'){

                        return $this->url;
                    }

                }),

                

                Tags::make('Tags')->withoutSuggestions()->hideFromIndex(), 

                BelongsToMany::make('Group'),

                HasMany::make('Review')
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

            new EmailTopicGroup, 
        ];
    }
}

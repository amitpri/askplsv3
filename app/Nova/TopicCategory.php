<?php

namespace App\Nova;


use Auth;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Fields\DateTime;

use Illuminate\Http\Request;
use Laravel\Nova\Http\Requests\NovaRequest;

use Laravel\Nova\Fields\Select;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\BelongsTo;

use Laravel\Nova\Fields\HasMany; 

use Outhebox\NovaHiddenField\HiddenField;

use OwenMelbz\RadioField\RadioButton;
 
use Laravel\Nova\Fields\Trix;
use Sixlive\TextCopy\TextCopy;

use App\Nova\Hotel;
use App\Nova\Doctor;
use Laravel\Nova\Fields\MorphTo;

class TopicCategory extends Resource
{
    public static $group = '1.Topics';

    public static $model = 'App\TopicCategory';

    public static function label() {

        return 'Topic - Categories';

    }


    public static $title = 'topic_name';

    public static $search = [
        
        'user_id' ,'topic_name' , 'url' ,'topicable_type'
    ];

 
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;
        $loggedinrole = Auth::user()->role;

        if( $loggedinrole == "super"){

            return [
                    ID::make()->sortable(), 

                    RadioButton::make('Anonymous', 'anonymous')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',                    
                    ])->default('1')->hideFromIndex(), 

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

                    HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

                    Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                            ->help(
                                'The heading of the review being asked for. Max length 100'
                            )->hideWhenUpdating(), 

                    Text::make('Topic Name')->hideFromIndex()->onlyOnForms()->hideWhenCreating()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),  

                    Trix::make('Details'), 

                     

                    RadioButton::make('Active', 'status')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',
                    ])->sortable()->default('1')->hideFromIndex(), 

                    HiddenField::make( 'url')->default(mt_rand(100000000, 999999999))->hideFromIndex()->hideFromDetail()->hideWhenUpdating(),

                    TextCopy::make('Public URL' ,function(){
 
                        if($this->topicable_type == 'App\Company'){

                                return 'https://askpls.com/t/d?type=companies&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Doctor'){

                                return 'https://askpls.com/t/d?type=doctors&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\School'){

                                return 'https://askpls.com/t/d?type=schools&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\College'){

                                return 'https://askpls.com/t/d?type=colleges&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Restaurant'){

                                return 'https://askpls.com/t/d?type=restaurants&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Hotel'){

                                return 'https://askpls.com/t/d?type=hotels&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Lawyer'){

                                return 'https://askpls.com/t/d?type=lawyers&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\FitnessCenter'){

                                return 'https://askpls.com/t/d?type=fitnesscenters&url=' . $this->url;
                        } 

                    })->hideWhenUpdating(),
 
                ];

        }else{
 
                return [
                    ID::make()->sortable()->hideFromIndex(), 

                    RadioButton::make('Anonymous', 'anonymous')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',                    
                    ])->default('0')->hideFromIndex(),  

                    MorphTo::make('Category', 'topicable')->types([
                        Doctor::class,
                        Hotel::class,
                        Company::class,
                        Lawyer::class,
                        School::class,
                        College::class,
                        Restaurant::class,
                        FitnessCenter::class,
                    ])->searchable(),

                    HiddenField::make('User', 'user_id')->current_user_id()->hideFromIndex()->hideFromDetail(),

                    Text::make('Topic Name')->sortable()->rules('required', 'max:100')
                            ->help(
                                'The heading of the review being asked for. Max length 100'
                            )->hideWhenUpdating(), 

                    Text::make('Topic Name')->hideFromIndex()->onlyOnForms()->hideWhenCreating()->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),  

                    Trix::make('Details'), 
                   

                    RadioButton::make('Active', 'status')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',
                    ])->sortable()->default('1')->hideFromIndex(), 

                    HiddenField::make( 'url')->default(mt_rand(100000000, 999999999))->hideFromIndex()->hideFromDetail()->hideWhenUpdating(),

                    TextCopy::make('Public URL' ,function(){
 
                        if($this->topicable_type == 'App\Company'){

                                return 'https://askpls.com/t/d?type=companies&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Doctor'){

                                return 'https://askpls.com/t/d?type=doctors&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\School'){

                                return 'https://askpls.com/t/d?type=schools&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\College'){

                                return 'https://askpls.com/t/d?type=colleges&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Restaurant'){

                                return 'https://askpls.com/t/d?type=restaurants&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Hotel'){

                                return 'https://askpls.com/t/d?type=hotels&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Lawyer'){

                                return 'https://askpls.com/t/d?type=lawyers&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\FitnessCenter'){

                                return 'https://askpls.com/t/d?type=fitnesscenters&url=' . $this->url;
                        } 

                    })->hideWhenUpdating(),
          
   
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

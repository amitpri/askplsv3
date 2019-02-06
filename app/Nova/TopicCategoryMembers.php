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
   
use App\Nova\DoctorMember;
use App\Nova\HotelMember;
use App\Nova\CompanyMember;
use App\Nova\LawyerMember;
use App\Nova\SchoolMember;
use App\Nova\CollegeMember;
use App\Nova\RestaurantMember;
use App\Nova\FitnessCenterMember;
 

use Sixlive\TextCopy\TextCopy; 
use Laravel\Nova\Fields\MorphTo;

class TopicCategoryMembers extends Resource
{
    public static $group = '1.Topics';

    public static $model = 'App\TopicCategoryMembers';

    public static function label() {

        return 'Topic - Members';

    }


    public static $title = 'topic_name';

    public static $search = [
        
        'user_id' ,'topic_name' , 'url' ,'topicable_type'
    ];

 
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;

        if( $loggedinemail == "amitpri@gmail.com"){

            return [
                    ID::make()->sortable(), 

                    RadioButton::make('Anonymous', 'anonymous')
                    ->options([ 
                        '0' => 'No',
                        '1' => 'Yes',                    
                    ])->default('1')->hideFromIndex(), 

                    MorphTo::make('Topicable')->types([
                        DoctorMember::class,
                        HotelMember::class,
                        CompanyMember::class,
                        LawyerMember::class,
                        SchoolMember::class,
                        CollegeMember::class,
                        RestaurantMember::class,
                        FitnessCenterMember::class,
                    ]),

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
 

                        return 'https://askpls.com/p/' . $this->url;
 

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
                        DoctorMember::class,
                        HotelMember::class,
                        CompanyMember::class,
                        LawyerMember::class,
                        SchoolMember::class,
                        CollegeMember::class,
                        RestaurantMember::class,
                        FitnessCenterMember::class,
                    ]),

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
 

                            return 'https://askpls.com/p/' . $this->url;
 
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

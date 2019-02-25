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

use App\Nova\Actions\EmailTopicCategoryGroup;

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
        $loggedinrole = Auth::user()->role;
        $loggedinpaid = Auth::user()->paid; 
        $loggedintopicable_type = Auth::user()->topicable_type;

        if( $loggedinrole == "super"){

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
 
                        if($this->topicable_type == 'App\Company'){

                                return 'https://askpls.com/t/p?type=companies&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Doctor'){

                                return 'https://askpls.com/t/p?type=doctors&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\School'){

                                return 'https://askpls.com/t/p?type=schools&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\College'){

                                return 'https://askpls.com/t/p?type=colleges&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Restaurant'){

                                return 'https://askpls.com/t/p?type=restaurants&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Hotel'){

                                return 'https://askpls.com/t/p?type=hotels&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\Lawyer'){

                                return 'https://askpls.com/t/p?type=lawyers&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\FitnessCenter'){

                                return 'https://askpls.com/t/p?type=fitnesscenters&url=' . $this->url;
                        } 

                    })->hideWhenUpdating(),

                    HasMany::make('ReviewMember'),
 
                ];

        }elseif( $loggedinpaid == 1 && $loggedintopicable_type == 'App\Company'){

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
 
                        if($this->topicable_type == 'App\CompanyMember'){

                                return 'https://askpls.com/t/p?type=companies&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\DoctorMember'){

                                return 'https://askpls.com/t/p?type=doctors&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\SchoolMember'){

                                return 'https://askpls.com/t/p?type=schools&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\CollegeMember'){

                                return 'https://askpls.com/t/p?type=colleges&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\RestaurantMember'){

                                return 'https://askpls.com/t/p?type=restaurants&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\HotelMember'){

                                return 'https://askpls.com/t/p?type=hotels&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\LawyerMember'){

                                return 'https://askpls.com/t/p?type=lawyers&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\FitnessCenterMember'){

                                return 'https://askpls.com/t/p?type=fitnesscenters&url=' . $this->url;
                        } 

                    })->hideWhenUpdating(),

                    BelongsToMany::make('Group'),
                    
                    HasMany::make('ReviewMember'),
          
   
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
 
                        if($this->topicable_type == 'App\CompanyMember'){

                                return 'https://askpls.com/t/p?type=companies&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\DoctorMember'){

                                return 'https://askpls.com/t/p?type=doctors&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\SchoolMember'){

                                return 'https://askpls.com/t/p?type=schools&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\CollegeMember'){

                                return 'https://askpls.com/t/p?type=colleges&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\RestaurantMember'){

                                return 'https://askpls.com/t/p?type=restaurants&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\HotelMember'){

                                return 'https://askpls.com/t/p?type=hotels&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\LawyerMember'){

                                return 'https://askpls.com/t/p?type=lawyers&url=' . $this->url;
                        } 
                        if($this->topicable_type == 'App\FitnessCenterMember'){

                                return 'https://askpls.com/t/p?type=fitnesscenters&url=' . $this->url;
                        } 

                    })->hideWhenUpdating(),
                    
                    HasMany::make('ReviewMember'),
          
   
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
        $loggedinpaid = Auth::user()->paid;
        $loggedinrole = Auth::user()->role;
        $loggedintopicable_type = Auth::user()->topicable_type;

        if( $loggedinrole == 'super'){

            return [

                new EmailTopicCategoryGroup, 
            ];

        }elseif( $loggedinpaid == 1 && $loggedintopicable_type == 'App\Company'){

            return [

                new EmailTopicCategoryGroup, 
            ];

        }else{

            return [
 
            ];

        } 
    }
}

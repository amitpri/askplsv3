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

class MemberProfile extends Resource
{
    public static $group = '0.Admin';

    public static $model = 'App\MemberProfile';

    public static function label() {

        return 'Member Profile';

    }


    public static $title = 'topic_name';

    public static $search = [
        
        'id' ,'user_code' , 'name' ,'email' ,'topicable_type'
    ];

 
    public function fields(Request $request)
    {
        
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;
        $loggedinrole = Auth::user()->role;

        if( $loggedinrole == "super"){

            return [ 

                    Text::make('Id')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('User Code')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]),

                    Text::make('Name')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]), 

                    Text::make('Email')->withMeta(['extraAttributes' => [
                              'readonly' => true
                        ]]), 

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

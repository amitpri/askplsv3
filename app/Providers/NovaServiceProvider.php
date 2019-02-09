<?php

namespace App\Providers;

use Auth;
use Laravel\Nova\Nova;
use Laravel\Nova\Cards\Help;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\NovaApplicationServiceProvider;

use App\Nova\Metrics\ProfileCount;
use App\Nova\Metrics\GroupCount;
use App\Nova\Metrics\TopicCount;
use App\Nova\Metrics\ReviewCount; 

use App\Nova\Profile;
use App\Nova\Group;
use App\Nova\GroupProfile;
use App\Nova\DataImport;
use App\Nova\Topic;
use App\Nova\Review;
use App\Nova\Template;
use App\Nova\Account; 
use App\Nova\Member;
use App\Nova\Payment;
use App\Nova\Setting;
use App\Nova\Company; 
use App\Nova\CompanyMember; 
use App\Nova\Feedback; 
use App\Nova\User;
use App\Nova\TopicLog;
use App\Nova\TopicMail;
use App\Nova\Job;
use App\Nova\Tenant;
use App\Nova\TenantUser;
use App\Nova\Category;
use App\Nova\ContactForm;
use App\Nova\Hotel;
use App\Nova\HotelMember;
use App\Nova\Doctor;
use App\Nova\DoctorMember;
use App\Nova\Lawyer;
use App\Nova\LawyerMember;
use App\Nova\TopicCategory;
use App\Nova\TopicCategoryMembers;
use App\Nova\Track;
use App\Nova\Order;
use App\Nova\City;
use App\Nova\Faq;
use App\Nova\FaqCategory;
use App\Nova\School;
use App\Nova\College;
use App\Nova\Restaurant;
use App\Nova\FitnessCenter;
use App\Nova\Membership;
use App\Nova\SchoolMember;
use App\Nova\CollegeMember;
use App\Nova\RestaurantMember;
use App\Nova\FitnessCenterMember;
use App\Nova\MembershipMember;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
 
    protected function resources()
      { 
            $loggedinemail = Auth::user()->email;
 

                Nova::resources([

                    Profile::class,
                    Group::class,
                    GroupProfile::class,
                    DataImport::class,
                    TopicCategoryMembers::class,
                    Topic::class,  
                    Review::class, 
                    Category::class,
                    TopicLog::class,
                    TopicMail::class,
                    Job::class,
                    Account::class,
                    Setting::class,
                    Membership::class,
                    Tenant::class,
                    TenantUser::class, 
                    ContactForm::class,
                    TopicCategory::class,
                    College::class,
                    CollegeMember::class,
                    Company::class,
                    CompanyMember::class,
                    Doctor::class,
                    DoctorMember::class,
                    FitnessCenter::class,
                    FitnessCenterMember::class,
                    Hotel::class,
                    HotelMember::class,
                    Lawyer::class,
                    LawyerMember::class,
                    Restaurant::class,
                    RestaurantMember::class,
                    School::class,
                    SchoolMember::class, 
                    Track::class,
                    Template::class,
                    Order::class,
                    City::class,
                    Faq::class,
                    FaqCategory::class,

 
                ]);
     
     }

    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the Nova routes.
     *
     * @return void
     */
    protected function routes()
    {
        Nova::routes()
                ->withAuthenticationRoutes()
                ->withPasswordResetRoutes()
                ->register();
    }

    /**
     * Register the Nova gate.
     *
     * This gate determines who can access Nova in non-local environments.
     *
     * @return void
     */
    protected function gate()
    {
        
    }

    /**
     * Get the cards that should be displayed on the Nova dashboard.
     *
     * @return array
     */
    protected function cards()
    {

        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;

        if( $loggedinemail == "amitpri@gmail.com"){

                return [  
          //          new \Askpls\Workspacesummary\Workspacesummary(),
                    new TopicCount,
                    new ReviewCount, 

                    new \Tightenco\NovaGoogleAnalytics\PageViewsMetric,
                    new \Tightenco\NovaGoogleAnalytics\VisitorsMetric,
                    new \Tightenco\NovaGoogleAnalytics\MostVisitedPagesCard,


                    
                    
                    ];

        }else{

            if( $loggedintenant == 0 ){

                return [  
              //     new \Askpls\Workspacesummary\Workspacesummary(),
                    new TopicCount,
                    new ReviewCount,  
                    
                    
                    ];
            }else{


                return [
              //      new \Askpls\Workspacesummary\Workspacesummary(),
                    new GroupCount,
                    new ProfileCount,
                    new ReviewCount,
                    new TopicCount, 
                    
                ];

            }
        }

        
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        $loggedintenant = Auth::user()->tenant; 
        $loggedinemail= Auth::user()->email;

        if( $loggedinemail == "amitpri@gmail.com"){

            return [

              //  new \Askpls\Work\Work(),
                    new \PhpJunior\NovaLogViewer\Tool(),
                    new \Christophrumpel\NovaNotifications\NovaNotifications(),
                    new \Dniccum\CustomEmailSender\CustomEmailSender(),
                    new \Askpls\Payments\Payments(),

               //     \ChrisWare\NovaBreadcrumbs\NovaBreadcrumbs::make(),

            ];

        }else{

            return [
              
                  new \Askpls\Payments\Payments(),

            ];
        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

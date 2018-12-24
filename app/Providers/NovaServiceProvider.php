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
use App\Nova\Account; 
use App\Nova\Member;
use App\Nova\Payment;
use App\Nova\Setting;
use App\Nova\Company; 
use App\Nova\Feedback; 
use App\Nova\User;
use App\Nova\TopicLog;
use App\Nova\TopicMail;
use App\Nova\Job;
use App\Nova\Tenant;
use App\Nova\TenantUser;

class NovaServiceProvider extends NovaApplicationServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    protected function resources()
      { 
             Nova::resources([

                Profile::class,
                Group::class,
                GroupProfile::class,
                DataImport::class,
                Topic::class,  
                Review::class, 
                TopicLog::class,
                TopicMail::class,
                Job::class,
                Account::class,
                Setting::class,
                Tenant::class,
                TenantUser::class, 
 
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

        if( $loggedintenant == 0 ){

            return [  
                new \Askpls\Workspace\Workspace(),
                new TopicCount,
                new ReviewCount, 
                
                
            ];
        }else{


            return [
                new \Askpls\Workspace\Workspace(),
                new GroupCount,
                new ProfileCount,
                new ReviewCount,
                new TopicCount,
                
            ];

        }
    }

    /**
     * Get the tools that should be listed in the Nova sidebar.
     *
     * @return array
     */
    public function tools()
    {
        return [];
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

<?php

namespace App\Providers;

use App\Profile;
use App\Group;
use App\GroupProfile;
use App\DataImport;
use App\Topic;    
use App\Review;
use App\TopicLog;
use App\TopicMail;
use App\Job;
use App\Account;
use App\Setting;
use App\Feedback;
use App\Tenant;
use App\TenantUser;
use App\Category;
use App\Template;
use App\ContactForm;
use App\College;
use App\Company;
use App\Doctor;
use App\FitnessCenter;
use App\Hotel;
use App\Lawyer;
use App\Restaurant;
use App\School;
use App\Track;
use App\Membership;
use App\TopicCategoryMembers;
use App\Order;

use App\Policies\ProfilePolicy;
use App\Policies\GroupPolicy;
use App\Policies\GroupProfilePolicy;
use App\Policies\DataImportPolicy;
use App\Policies\TopicPolicy;  
use App\Policies\ReviewPolicy;
use App\Policies\TopicLogPolicy;
use App\Policies\TopicMailPolicy;
use App\Policies\PendingJobsPolicy;
use App\Policies\AccountPolicy;
use App\Policies\SettingPolicy;
use App\Policies\FeedbackPolicy;
use App\Policies\TenantPolicy;
use App\Policies\TenantUserPolicy;
use App\Policies\CategoryPolicy;
use App\Policies\TemplatePolicy;
use App\Policies\ContactFormPolicy;
use App\Policies\CollegePolicy;
use App\Policies\CompanyPolicy;
use App\Policies\DoctorPolicy;
use App\Policies\FitnessCenterPolicy;
use App\Policies\HotelPolicy;
use App\Policies\LawyerPolicy;
use App\Policies\RestaurantPolicy;
use App\Policies\SchoolPolicy;
use App\Policies\TrackPolicy;
use App\Policies\OrderPolicy;

use App\Policies\MembershipPolicy;
use App\Policies\TopicCategoryMembersPolicy;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',   
        Profile::class => ProfilePolicy::class,
        Group::class => GroupPolicy::class,
        GroupProfile::class => GroupProfilePolicy::class,
        DataImport::class => DataImportPolicy::class,
        Topic::class => TopicPolicy::class, 
        Review::class => ReviewPolicy::class,
        TopicLog::class => TopicLogPolicy::class,
        TopicMail::class => TopicMailPolicy::class,
        Job::class => PendingJobsPolicy::class,
        Account::class => AccountPolicy::class,
        Setting::class => SettingPolicy::class,
        Feedback::class => FeedbackPolicy::class, 
        Tenant::class => TenantPolicy::class,
        TenantUser::class => TenantUserPolicy::class,
        Category::class => CategoryPolicy::class,
        Template::class => TemplatePolicy::class,
        ContactForm::class => ContactFormPolicy::class,

        College::class => CollegePolicy::class,
        Company::class => CompanyPolicy::class,
        Doctor::class => DoctorPolicy::class,
        FitnessCenter::class => FitnessCenterPolicy::class,
        Hotel::class => HotelPolicy::class,
        Lawyer::class => LawyerPolicy::class,
        Restaurant::class => RestaurantPolicy::class,
        School::class => SchoolPolicy::class,
        Track::class => TrackPolicy::class,

        Membership::class => MembershipPolicy::class,
        TopicCategoryMembers::class => TopicCategoryMembersPolicy::class,

        Order::class => OrderPolicy::class,


        
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}

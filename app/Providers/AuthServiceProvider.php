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

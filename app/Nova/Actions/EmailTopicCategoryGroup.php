<?php

namespace App\Nova\Actions;

use Auth;
use Illuminate\Bus\Queueable;
use Laravel\Nova\Actions\Action;
use Illuminate\Support\Collection;
use Laravel\Nova\Fields\ActionFields;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Http\Request;
use App\Mail\MailTopicGroup;
use App\Jobs\SendMail;

use App\TopicCategoryMembers;
use App\TopicGroup;
use App\Group;
use App\Profile;
use App\GroupProfile;
use App\TopicMail;
use App\TopicLog;

class EmailTopicCategoryGroup extends Action // implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels; 

    public function handle(ActionFields $fields, Collection $models)
    {
      
        foreach ($models as $model) {
 
            $topic_id = $model->id;
            $user_id = $model->user_id;
            $loggedinid = Auth::user()->id;

   //          dd($topic_id);
            $groups = TopicCategoryMembers::find($topic_id)->group()->get();

     //       dd($groups);

            foreach ($groups as $group) {

                $group_id = $group->id;

                $newtopiclog = TopicLog::create([

                    'user_id' => $loggedinid,
                    'topic_id' => $topic_id,
                    'group_id' => $group_id,
                    'topic_name' => $topic_id,
                    'group_title' => $group_id, 

                ]);
 

                $profiles = Group::find($group_id)->profiles()->get();
 
                foreach ($profiles as $profile) {
 
 
                    $emailid = $profile->emailid;
                    $profileid = $profile->id; 
                    $mailkey = str_random(50); 

                    $topicname = "Hi";
                    $username = "Amit";

                    $newmail = TopicMail::create([

                        'user_id' => $loggedinid,
                        'topic_id' => $topic_id,
                        'group_id' => $group_id,
                        'profile_id' => $profileid,
                        'emailid' => $emailid,
                        'mailkey' => $mailkey,

                    ]);

                     \Mail::to($emailid)->queue(new MailTopicGroup($topicname,$username,$mailkey));

                }


            }
  

        }

     
    }

    public function fields()
    {
        return [

        //Text::make('Subject'),

        ];
    }
}

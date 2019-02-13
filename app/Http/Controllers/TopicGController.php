<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;

use App\User;
use App\ShowTopic;
use App\Feedback;
use App\Category;
use App\ShowCategory;
use App\City;
use App\Track;

use App\ShowTopicCategory;
use App\ShowTopicMemberCategory;
use App\ShowReview;
use App\ShowReviewMember;
use App\Doctor;
use App\Lawyer;
use App\Company;
use App\College;
use App\School;
use App\Hotel;
use App\Restaurant; 
use App\FitnessCenter;

use App\Mail\PostCategoryReview;
use App\Mail\PostCategoryMemberReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TopicGController extends Controller
{
    public function index(Request $request)
    {

        $categories = ShowCategory::orderBy('order','asc')->get(['id','category','status']);

        $categorytype = '';

        $userid = "1";
        $user_name ="";
        $user_email ="";
        $ipaddress = $request->getClientIp();
        $page ="index";
        $url_code ="";
        $type ="";
        $referrer ="";
 
        $track = Track::create(
                [   
                    'user_id' => $userid,
                    'user_name' => $user_name,
                    'user_email' => $user_email,
                    'ipaddress' => $ipaddress,   
                    'page' => $page,
                    'url' => $url_code,
                    'type' => $type,
                    'referrer' => $referrer,                              
                ]);

        $searchcategoryid = '';

         $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name`, a.`video` ,a.`image` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at, a.`comments`
                                    FROM `topics` a ,  `users` b,  `categories` c 
                                            WHERE a.`user_id` = b.`id`
                                            AND a.`category_id` = c.`id`
                                            AND a.`type` = 'public'
                                            AND a.`sitedisplay` = 1
                                            AND a.`status` = 1
                                            AND a.`frontdisplay` = 1
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");

        return view('topicsG',compact('categories', 'categorytype', 'searchcategoryid', 'topics'));
   
    }
}

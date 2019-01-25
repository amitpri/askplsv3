<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\User;
use App\ShowTopic;
use App\Feedback;
use App\Category;
use App\ShowCategory;
use App\City;

use App\ShowTopicCategory;
use App\ShowReview;
use App\Doctor;
use App\Lawyer;
use App\Company;
use App\College;
use App\School;
use App\Hotel;
use App\Restaurant; 
use App\FitnessCenter;

use App\Mail\PostCategoryReview;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class TopicController extends Controller
{
    public function index()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        return view('topics',compact('categories'));
   
    }

    public function default(Request $request)
    { 

        $category = $request->category;

        if(isset($category)){

        }else{

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

        }

        return $topics;
   
    }

    public function topicscategories(Request $request)
    { 

        $categoryid = $request->categoryid;
 

        $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` , a.`video` ,a.`image` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                            WHERE a.`user_id` = b.`id`
                                            AND a.`category_id` = c.`id`
                                            AND a.`type` = 'public'
                                            AND a.`sitedisplay` = 1
                                            AND a.`status` = 1
                                            AND a.`frontdisplay` = 1
                                            AND c.`id` = :categoryid
                                            ORDER BY a.`updated_at` DESC
                                            limit 10", ['categoryid' => $categoryid]);
 

            return $topics;
   
    }

    public function topicscategoriesdoctor(Request $request)
    { 

        $categoryid = $request->categoryid;
        $categorytype = $request->type;

        $query_option = "";

        if(isset($request->city)){

            $query_option .= " AND `city` = '" . $request->city . "'" ;
        }

        if(isset($request->search)){
             
            $query_option .= " AND `name` like '%" . $request->search . "%'" ;
        }

        $query_option .= " AND 1 = 1"; 

        if( $categorytype == 'Colleges'){
            
            $category_table = 'colleges';

            $topics = DB::select("SELECT  a.`id`,a.`collegekey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` , a.`city` ,a.`state`,a.`country` ,  a.`profilepic` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `colleges` a   
                                            WHERE a.`status` = 1  " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");

      

        }
        if( $categorytype == 'Companies'){

             $category_table = 'companies';

             $topics = DB::select("SELECT  a.`id`,a.`companykey` as url , a.`name` , a.`type`,   a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`website`,  a.`links`,  a.`profilepic`, a.`video`,  DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `companies` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Doctors'){

             $category_table = 'doctors';

             $topics = DB::select("SELECT  a.`id`,a.`doctorkey` as url , a.`name` , a.`speciality`,  a.`gender`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`qualification`, a.`exp` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `doctors` a 
                                            WHERE  a.`status` = 1  " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
 
        }
        if( $categorytype == 'Fitness Centers'){

             $category_table = 'fitness_centers';

             $topics = DB::select("SELECT  a.`id`,a.`fitnesscenterkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `fitness_centers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Hotels'){

             $category_table = 'hotels';

             $topics = DB::select("SELECT  a.`id`,a.`hotelkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `hotels` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Lawyers'){

             $category_table = 'lawyers';

             $topics = DB::select("SELECT  a.`id`,a.`lawyerkey` as url , a.`name` , a.`speciality`,  a.`gender`, a.`address` ,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video`  , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `lawyers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Restaurants'){

             $category_table = 'restaurants';

             $topics = DB::select("SELECT  a.`id`,a.`restaurantkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `restaurants` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }

        if( $categorytype == 'Schools'){ 

             $category_table = 'schools';

            $topics = DB::select("SELECT  a.`id`,a.`schoolkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `schools` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");

         }
  
 
            return $topics;
   
    }

    public function categoriesdefault()
    { 

        $categories = ShowCategory::orderBy('category','asc')->get(['id','category', 'status']);
 
        return $categories;
   
    }

    public function getmore(Request $request)
    {

        $row_count = $request->row_count;

        $topics = DB::select('SELECT  a.`id`, a.`user_id`,  a.`topic_name`,  a.`details` , b.`name`, a.`comments`
                                        FROM `topics` a ,  `users` b 
                                        WHERE a.`user_id` = b.`id`
                                        AND a.`type` = "public"
                                        ORDER BY a.`updated_at` DESC
                                        limit :limit offset :offset'  
                                                        , [ 'limit' => $limit , 'offset' => $offset]);
 

        return $topics;
   
    }

    public function filtered(Request $request)
    {

        $topicsinput = $request->topics;
        
        $topics = ShowTopic::
                where('published', '=' , 1)
                ->where('status', '=' , 1)->where('type', '=' , 'public')
                ->where('topic', 'like' , "%$topicsinput%")
                ->take(10)
                ->get(['id','topic','details']);
                  
        return $topics;
   
    } 

    public function show($url)
    {
 
         $topic = ShowTopic::where('url','=',$url)->where('type','=','public')->first(['id','url' , 'topic_name']); 
        
        $id = $topic->id;
        $topic_name = $topic->topic_name;
       
        return view('showtopic',compact('url','id' ,'topic_name'));
   
    } 

    public function showdetails(Request $request)
    {
 
        $id = $request->id; 

        $topic = ShowTopic::where('id','=',$id)->where('type','=','public')->first(['id','topic','details','type']);
        
        return $topic;
    }

    public function messages(Request $request)
    {   
        $inpid = $request->id; 

        $topic = Feedback::where('topic_id','=',$inpid)->orderBy('updated_at','desc')->get(['id','topic','review','created_at']); 

        return $topic;
   
    } 

    public function postfeedback(Request $request)
    {   
        $inptopicid = $request->topicid;
        $inptopicname = $request->topicname;
        $inpfeedback = $request->feedback;

        $topic = ShowTopic::where('id','=',$inptopicid)->where('topic','=',$inptopicname)->first(['id','user_id']); 

        $userid = $topic->user_id;

        $postfeedback = Feedback::create(
                [   
                    'user_id' => $userid,
                    'topic_id' => $inptopicid,
                    'topic' => $inptopicname,
                    'review' => $inpfeedback,
                    'published' => 1,
                    'status' => 1,                                 
                ]);

        $publishdata = [

            'event' => "NewFeedback_$userid",
            'data' => [
                'topic_id' => $inptopicid,
                'topic' => $inptopicname,
                'review' => $inpfeedback,
            ]
            
        ]; 

        Redis::publish('channel_feedback',json_encode($publishdata));

        return $postfeedback;
   
    } 


    public function gettopics(Request $request)
    {
        $category = $request->category; 
        $city = $request->city;

        if($category == "Doctors"){


            $topics = DB::select("SELECT  a.`id`,a.`doctorkey` as url , a.`name` , a.`speciality`,  a.`gender`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `doctors` a   
                                            WHERE  a.`status` = 1 
                                            AND b.`category` = :category
                                            ORDER BY a.`updated_at` DESC
                                            limit 10", ['category' => $category]);

        }

        


        return $topics;
    }

    public function categoryurl($category, $url){

        $user_code = $url;
        $categorytype = $category;

        if( $categorytype == 'Colleges'){
            
            $user = College::where('collegekey','=',$url)->first(['id','collegekey AS user_code']);

        }
        if( $categorytype == 'Companies'){

            $user = Company::where('companykey','=',$url)->first(['id','companykey AS user_code']);

        }
        if( $categorytype == 'Doctors'){

            $user = Doctor::where('doctorkey','=',$url)->first(['id','doctorkey AS user_code']);
        }
        if( $categorytype == 'Fitness Centers'){

            $user = FitnessCenter::where('fitnesscenterkey','=',$url)->first(['id','fitnesscenterkey AS user_code']);

        }
        if( $categorytype == 'Hotels'){

            $user = Hotel::where('hotelkey','=',$url)->first(['id','hotelkey AS user_code']);
        }
        if( $categorytype == 'Lawyers'){

            $user = Lawyer::where('lawyerkey','=',$url)->first(['id','lawyerkey AS user_code']);
        }
        if( $categorytype == 'Restaurants'){

            $user = Restaurant::where('restaurantkey','=',$url)->first(['id','restaurantkey AS user_code']);
        }

        if( $categorytype == 'Schools'){ 

            $user = School::where('schoolkey','=',$url)->first(['id','schoolkey AS user_code']);

         }  
         

        $id = $user->id; 
 
        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype'));
    }

    public function viewprofiledoctordetails(Request $request){

        $usercode = $request->usercode;
        $id = $request->id;  
        $categorytype = $request->categorytype;

        if( $categorytype == 'Colleges'){
            
            $user = College::where('collegekey','=',$usercode)->where('id','=',$id)
                    ->first(['id','collegekey', 'name' , 'city' , 'country' , 'profilepic' ]); 

        }
        if( $categorytype == 'Companies'){

            $user = Company::where('companykey','=',$usercode)->where('id','=',$id)
                    ->first(['id','companykey', 'name' , 'city' , 'country' , 'profilepic' ]); 

        }
        if( $categorytype == 'Doctors'){

            $user = Doctor::where('doctorkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','doctorkey', 'name' , 'city' , 'country' , 'profilepic' ]); 
        }
        if( $categorytype == 'Fitness Centers'){

            $user = FitnessCenter::where('fitnesscenterkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','fitnesscenterkey', 'name' , 'city' , 'country' , 'profilepic' ]); 

        }
        if( $categorytype == 'Hotels'){

            $user = Hotel::where('hotelkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','hotelkey', 'name' , 'city' , 'country' , 'profilepic' ]); 
        }
        if( $categorytype == 'Lawyers'){

            $user = Lawyer::where('lawyerkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','lawyerkey', 'name' , 'city' , 'country' , 'profilepic' ]); 
        }
        if( $categorytype == 'Restaurants'){

            $user = Restaurant::where('restaurantkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','restaurantkey', 'name' , 'city' , 'country' , 'profilepic' ]); 
        }

        if( $categorytype == 'Schools'){ 

            $user = School::where('schoolkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','schoolkey', 'name' , 'city' , 'country' , 'profilepic' ]); 

         }  

        

        return $user;

    }

    public function viewprofileshowtopicsdoctor(Request $request)
    {   

        $usercode = $request->usercode;
        $id = $request->id;  
        $categorytype = $request->categorytype;

        if( $categorytype == 'Colleges'){
            
            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `colleges` b
                                        WHERE b.`id` = :id
                                        AND b.`collegekey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%College%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        }
        if( $categorytype == 'Companies'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `companies` b
                                        WHERE b.`id` = :id
                                        AND b.`companykey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Company%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        }
        if( $categorytype == 'Doctors'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `doctors` b
                                        WHERE b.`id` = :id
                                        AND b.`doctorkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Doctor%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }
        if( $categorytype == 'Fitness Centers'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `fitness_centers` b
                                        WHERE b.`id` = :id
                                        AND b.`fitnesscenterkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Fitness%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        }
        if( $categorytype == 'Hotels'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `hotels` b
                                        WHERE b.`id` = :id
                                        AND b.`hotelkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Hotel%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }
        if( $categorytype == 'Lawyers'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `lawyers` b
                                        WHERE b.`id` = :id
                                        AND b.`lawyerkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Lawyer%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }
        if( $categorytype == 'Restaurants'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `restaurants` b
                                        WHERE b.`id` = :id
                                        AND b.`restaurantkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Restaurant%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }

        if( $categorytype == 'Schools'){ 

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at 
                                FROM `topic_categories` a ,  `schools` b
                                        WHERE b.`id` = :id
                                        AND b.`schoolkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%School%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

         }    
        
        

        return $topics;
   
    }

    public function showdoctortopic(Request $request)
    {    
        
        $url = $request->url;
        $categorytype = $request->type;

        $topic = ShowTopicCategory::where('url','=',$url)->where('status','=',1)->first(['id','url' , 'topic_name' , 'topicable_type']);  
        
        $id = $topic->id;
        $topic_name = $topic->topic_name; 
       
        return view('showtopicdoctor',compact('url','id' ,'topic_name', 'categorytype'));
    }

    public function showdoctordetails(Request $request)
    {
 
        $url = $request->url; 
        $categorytype = $request->categorytype;  

        if( $categorytype == 'Colleges'){
            
            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`collegekey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `colleges` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        


        }
        if( $categorytype == 'Companies'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`companykey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `companies` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Doctors'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`doctorkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `doctors` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Fitness Centers'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`fitnesscenterkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `fitnesscenters` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 

        }
        if( $categorytype == 'Hotels'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`hotelkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `hotels` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Lawyers'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`lawyerkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `lawyers` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
         
        }
        if( $categorytype == 'Restaurants'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`restaurantkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `restaurants` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }

        if( $categorytype == 'Schools'){ 

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`schoolkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at
                                        FROM `topic_categories` a ,  `schools` b 
                                        WHERE a.`url` = :url
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 

         }   


            foreach ($topics as $topic) {
            
                $id = $topic->id;
                $url = $topic->url;
                $user_id = $topic->user_id;
                $topic_name = $topic->topic_name;
                $details = $topic->details;
                $username = $topic->name;
                $created_at = $topic->created_at; 
                $user_code = $topic->user_code;

                
            }

        
     
        return $topics;
    }

    public function messagesdoctor(Request $request)
    {
        $inpid = $request->id; 

        $reviews = ShowReview::where('topic_categories_id','=',$inpid)
                ->orderBy('updated_at','desc')->take(10)
                ->get(['id','topic_name','review','created_at']); 

 

        return $reviews;
    }

    public function postreviewdoctor(Request $request)
    {   

        $inptopicid = $request->topicid;
        $inptopicname = $request->topicname;
        $inpreview = $request->review; 

        $topic = ShowTopicCategory::where('id','=',$inptopicid)->where('topic_name','=',$inptopicname)->first(['id','user_id', 'url' , 'comments']);

        if(isset($topic)){

            $topiccomments = $topic->comments; 
            $userid = $topic->user_id;
            $url = $topic->url;

            $postfeedback = ShowReview::create(
                [   
                    'user_id' => $userid,
                    'topic_categories_id' => $inptopicid,
                    'topic_name' => $inptopicname,
                    'review' => $inpreview,
                //    'published' => 1,
                //    'status' => 1,                                 
                ]);

            $topicupdate = ShowTopicCategory::where('id', $inptopicid)->where('topic_name','=',$inptopicname)
                        ->update(['comments' => $topiccomments + 1]);

            $userdetails = User::where('id','=',$userid)->first(['id','email','name']);

            $emailid = $userdetails->email;
            $name = $userdetails->name;
     
            
            \Mail::to($emailid)->queue(new PostCategoryReview($url,$inptopicname,$name));
        
        }else{

            $topiccomments = 0; 
        }
 
        return $postfeedback;
   
    }

    public function getmoredoctor(Request $request)
    {

        $row_count = $request->row_count_category; 

        $categoryid = $request->categoryid;
        $categorytype = $request->type;

        $query_option = "";

        if(isset($request->city)){

            $query_option .= " AND `city` = '" . $request->city . "'" ;
        }

        if(isset($request->search)){
             
            $query_option .= " AND `name` like '%" . $request->search . "%'" ;
        }

        $query_option .= " AND 1 = 1"; 


        if( $categorytype == 'Colleges'){
            
            $category_table = 'colleges';

            $topics = DB::select("SELECT  a.`id`,a.`collegekey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` , a.`city` ,a.`state`,a.`country` ,  a.`profilepic` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `colleges` a   
                                            WHERE a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);

        }
        if( $categorytype == 'Companies'){

             $category_table = 'companies';

             $topics = DB::select("SELECT  a.`id`,a.`companykey` as url , a.`name` , a.`type`,   a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`website`,  a.`links`,  a.`profilepic`, a.`video`,  DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `companies` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Doctors'){

             $category_table = 'doctors';

             $topics = DB::select("SELECT  a.`id`,a.`doctorkey` as url , a.`name` , a.`speciality`,  a.`gender`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`qualification`, a.`exp` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `doctors` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Fitness Centers'){

             $category_table = 'fitness_centers';

             $topics = DB::select("SELECT  a.`id`,a.`fitnesscenterkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `fitness_centers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Hotels'){

             $category_table = 'hotels';

             $topics = DB::select("SELECT  a.`id`,a.`hotelkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `hotels` a 
                                            WHERE  a.`status` = 1  " .
                                            $query_option . " 
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Lawyers'){

             $category_table = 'lawyers';

             $topics = DB::select("SELECT  a.`id`,a.`lawyerkey` as url , a.`name` , a.`speciality`,  a.`gender`, a.`address` ,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video`  , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `lawyers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Restaurants'){

             $category_table = 'restaurants';

             $topics = DB::select("SELECT  a.`id`,a.`restaurantkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `restaurants` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }

        if( $categorytype == 'Schools'){ 

             $category_table = 'schools';

            $topics = DB::select("SELECT  a.`id`,a.`schoolkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `schools` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);

         }


       

        return $topics;
   
    } 
}

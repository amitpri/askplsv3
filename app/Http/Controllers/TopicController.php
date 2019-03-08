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

class TopicController extends Controller
{
    public function topics(Request $request)
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

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function index(Request $request)
    {
 
        $topics_insta = ShowTopic::where('status', '=' , 1)->where('type', '=' , 'public')
                ->where('instagram', '<>' , "NULL")
                ->take(4)
                ->get(['id', 'topic_name','url','instagram']);

        $topics_images = ShowTopic::where('status', '=' , 1)->where('type', '=' , 'public')
                ->where('image', '<>' , "NULL")
                ->take(10)
                ->get(['id', 'topic_name','url','image']);

        $topics_youtube = ShowTopic::where('status', '=' , 1)->where('type', '=' , 'public')
                ->where('video', '<>' , "NULL")
                ->take(10)
                ->get(['id' , 'topic_name','url','video']);

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

        return view('index',compact('topics_insta','topics_images','topics_youtube','topics'));
   
    }

    public function doctors()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'doctors';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function hotels()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'hotels';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function restaurants()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'restaurants';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function schools()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'schools';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid')); 
   
    }

    public function colleges()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'colleges';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function companies()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'companies';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function lawyers()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'lawyers';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
    }

    public function fitnesscenters()
    {

        $categories = ShowCategory::where('status', '=' , 1)->get(['id','category']);

        $categorytype = 'fitnesscenters';

        $searchcategoryid = '';

        return view('topics',compact('categories', 'categorytype', 'searchcategoryid'));
   
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

        if(isset($request->speciality)){
             
            $query_option .= " AND `speciality` like '%" . $request->speciality . "%'" ;
        }

        if(isset($request->searchtype)){
             
            $query_option .= " AND `type` like '%" . $request->searchtype . "%'" ;
        }

        if(isset($request->locality)){
             
            $query_option .= " AND `locality` like '%" . $request->locality . "%'" ;
        }

        if(isset($request->country)){
             
            $query_option .= " AND `country` like '%" . $request->country . "%'" ;
        }

        $query_option .= " AND 1 = 1"; 

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $category_table = 'colleges';

            $topics = DB::select("SELECT  a.`id`,a.`collegekey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` , a.`city` ,a.`state`,a.`country` ,  a.`profilepic` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `colleges` a   
                                            WHERE a.`status` = 1  " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC, a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");

      

        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

             $category_table = 'companies';

             $topics = DB::select("SELECT  a.`id`,a.`companykey` as url , a.`name` , a.`type`,   a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`website`,  a.`links`,  a.`profilepic`, a.`video`,  DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `companies` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

             $category_table = 'doctors';

             $topics = DB::select("SELECT  a.`id`,a.`doctorkey` as url , a.`name` , a.`speciality`,  a.`gender`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`qualification`,  a.`profilepic`, a.`exp` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `doctors` a 
                                            WHERE  a.`status` = 1  " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");
 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters' || $categorytype == 'fitness_centers'){

             $category_table = 'fitness_centers';

             $topics = DB::select("SELECT  a.`id`,a.`fitnesscenterkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `fitness_centers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

             $category_table = 'hotels';

             $topics = DB::select("SELECT  a.`id`,a.`hotelkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `hotels` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

             $category_table = 'lawyers';

             $topics = DB::select("SELECT  a.`id`,a.`lawyerkey` as url , a.`name` , a.`speciality`,  a.`gender`, a.`address` ,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video`  , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `lawyers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

             $category_table = 'restaurants';

             $topics = DB::select("SELECT  a.`id`,a.`restaurantkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `restaurants` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

             $category_table = 'schools';

            $topics = DB::select("SELECT  a.`id`,a.`schoolkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `schools` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`top` DESC,a.`profilepic` DESC, a.`updated_at` DESC
                                            limit 10");

         }
  
 
            return $topics;
   
    }

    public function topicscategoriesdoctorspeciality(Request $request)
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

        if(isset($request->speciality)){
             
            $query_option .= " AND `speciality` like '%" . $request->speciality . "%'" ;
        }

        $query_option .= " AND 1 = 1"; 

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $category_table = 'colleges';

            $topics = DB::select("SELECT  a.`id`,a.`collegekey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` , a.`city` ,a.`state`,a.`country` ,  a.`profilepic` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `colleges` a   
                                            WHERE a.`status` = 1  " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");

      

        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

             $category_table = 'companies';

             $topics = DB::select("SELECT  a.`id`,a.`companykey` as url , a.`name` , a.`type`,   a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`website`,  a.`links`,  a.`profilepic`, a.`video`,  DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `companies` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

             $category_table = 'doctors';

             $topics = DB::select("SELECT  a.`id`,a.`doctorkey` as url , a.`name` , a.`speciality`,  a.`gender`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`qualification`,  a.`profilepic`, a.`exp` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `doctors` a 
                                            WHERE  a.`status` = 1  " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

             $category_table = 'fitness_centers';

             $topics = DB::select("SELECT  a.`id`,a.`fitnesscenterkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `fitness_centers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

             $category_table = 'hotels';

             $topics = DB::select("SELECT  a.`id`,a.`hotelkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `hotels` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

             $category_table = 'lawyers';

             $topics = DB::select("SELECT  a.`id`,a.`lawyerkey` as url , a.`name` , a.`speciality`,  a.`gender`, a.`address` ,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video`  , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `lawyers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

             $category_table = 'restaurants';

             $topics = DB::select("SELECT  a.`id`,a.`restaurantkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `restaurants` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

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
  
        $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`user_code`,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at, a.`instagram`
                                        FROM `topics` a ,  `users` b 
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = b.`id`
                                        AND a.`type` = 'public' ", ['url' => $url]); 
     
   

        $topic = ShowTopic::where('url','=',$url)->where('type','=','public')->first(['id','url' , 'topic_name']); 
        
        $id = $topic->id;
        $topic_name = $topic->topic_name;
       
        return view('showtopic',compact('topics', 'url','id' ,'topic_name'));
   
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

    public function category(Request $request, $category ){

        $categorytype = $category; 

        $categories = ShowCategory::where('category','=',$categorytype)->orderBy('category','asc')->first(['id','category','status']);

        $searchcategoryid = $categories['id']; 
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

        return view('topics',compact('categories', 'categorytype' , 'searchcategoryid'));
  
    }

    public function categoryurl(Request $request,$category, $url , $inpname){

        $user_code = $url;
        $categorytype = $category;


        $userid = "1";
        $user_name ="";
        $user_email ="";
        $ipaddress = $request->getClientIp();
        $page ="list topic";
        $url_code = $url;
        $type = $categorytype;
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


        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $user = College::where('collegekey','=',$url)->first(['id','collegekey AS user_code', 'name' ,'type'  ,'address','locality' , 'city' , 'country'  , 'video' , 'website','links','details'  , 'profilepic' ]);

            $topicable = "App\College";

        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $user = Company::where('companykey','=',$url)->first(['id','companykey AS user_code', 'name' ,'type'  ,'address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]);

            $topicable = "App\Company";

        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $user = Doctor::where('doctorkey','=',$url)->first(['id','doctorkey AS user_code', 'name' , 'speciality','gender','address','locality',  'city' , 'country' ,'video' ,'website','links','details','qualification', 'exp' , 'profilepic' ]);

            $topicable = "App\Doctor";
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters' || $categorytype == 'fitness_centers'){

            $user = FitnessCenter::where('fitnesscenterkey','=',$url)->first(['id','fitnesscenterkey AS user_code', 'name','type'  ,'address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]);

            $topicable = "App\FitnessCenter";

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $user = Hotel::where('hotelkey','=',$url)->first(['id','hotelkey AS user_code', 'name','type' ,'address','locality',  'city' , 'country' ,'video' ,'website','links','details'   , 'profilepic' , 'video']);

            $topicable = "App\Hotel";
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $user = Lawyer::where('lawyerkey','=',$url)->first(['id','lawyerkey AS user_code', 'name', 'gender' ,'address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]);

            $topicable = "App\Lawyer";
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $user = Restaurant::where('restaurantkey','=',$url)->first(['id','restaurantkey AS user_code', 'name','type','address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic']);

            $topicable = "App\Restaurant";
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $user = School::where('schoolkey','=',$url)->first(['id','schoolkey AS user_code' , 'name','type','address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]);

            $topicable = "App\School"; 

         }  

         $id = $user->id;
         $user_code = $user->user_code;
         $name = $user->name;
         $type = $user->type;
         $address = $user->address;
         $locality = $user->locality;
         $city = $user->city;
         $country = $user->country;
         $video = $user->video;
         $website = $user->website;
         $links = $user->links;
         $details = $user->details;
         $profilepic = $user->profilepic;
         $speciality = $user->speciality;
         $gender = $user->gender;
         $qualification = $user->qualification;
         $exp = $user->exp; 
         

        $topic = ShowTopicCategory::where('topicable_type', '=', $topicable)->where('topicable_id', '=', $id)->first(['id']);

        if(!isset($topic)){
            
            $url = mt_rand(100000000, 999999999);
            $createtopic = ShowTopicCategory::create(
                [   
                    'user_id' => 1,
                    'topicable_type' => $topicable,
                    'topicable_id' => $id,
                    'topic_name' => "What is your review!",  
                    'type' => 'private',
                    'url' => $url,  
                    'anonymous' => 1,
                    'status' => 1,                     
                ]);

        }

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `colleges` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`collegekey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%College%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);

        }

        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `companies` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`companykey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Company%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);

        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `doctors` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`doctorkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Doctor%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `fitness_centers` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`fitnesscenterkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Fitness%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `hotels` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`hotelkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Hotel%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `lawyers` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`lawyerkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Lawyer%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `restaurants` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`restaurantkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Restaurant%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `schools` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`schoolkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%School%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $user_code]);

         }    
 
 
        return view('viewprofiledoctor', compact('topics','id', 'user_code', 'categorytype', 'name' ,'type',  'address' ,  'locality' ,'city' ,'country' ,'video' ,'website' ,'links' ,'details' ,'profilepic' ,'speciality' ,'gender' ,'qualification' ,'exp' , 'inpname' ));
    }

    public function viewprofiledoctordetails(Request $request){

        $usercode = $request->usercode;
        $id = $request->id;  
        $categorytype = $request->categorytype;

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $user = College::where('collegekey','=',$usercode)->where('id','=',$id)
                    ->first(['id','collegekey', 'name','type'  ,'address','locality' , 'city' , 'country'  , 'video' , 'website','links','details'  , 'profilepic'  ]); 

        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $user = Company::where('companykey','=',$usercode)->where('id','=',$id)
                    ->first(['id','companykey', 'name','type'  ,'address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]); 

        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $user = Doctor::where('doctorkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','doctorkey', 'name' , 'speciality','gender','address','locality',  'city' , 'country' ,'video' ,'website','links','details','qualification', 'exp' , 'profilepic' ]); 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters' || $categorytype == 'fitness_centers'){

            $user = FitnessCenter::where('fitnesscenterkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','fitnesscenterkey', 'name','type'  ,'address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]); 

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $user = Hotel::where('hotelkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','hotelkey', 'name' ,'type' ,'address','locality',  'city' , 'country'
                         ,'video' ,'website','links','details'   , 'profilepic' , 'video']); 
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $user = Lawyer::where('lawyerkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','lawyerkey', 'name','speciality', 'gender' ,'address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]); 
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $user = Restaurant::where('restaurantkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','restaurantkey', 'name','type','address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]); 
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $user = School::where('schoolkey','=',$usercode)->where('id','=',$id)
                    ->first(['id','schoolkey', 'name','type','address','locality' , 'city' , 'country'  ,'video' ,'website','links','details'  , 'profilepic' ]); 

         }  

        
        return $user;

    }

    public function viewprofileshowtopicsdoctor(Request $request)
    {   

        $usercode = $request->usercode;
        $id = $request->id;  
        $categorytype = $request->categorytype;

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `colleges` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`collegekey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%College%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `companies` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`companykey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Company%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `doctors` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`doctorkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Doctor%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `fitness_centers` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`fitnesscenterkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Fitness%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `hotels` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`hotelkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Hotel%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `lawyers` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`lawyerkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Lawyer%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `restaurants` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
                                        AND b.`restaurantkey` = :user_code
                                        AND a.`topicable_id` = b.`id` 
                                        AND a.`topicable_type` like  '%Restaurant%' 
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at ,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name
                                FROM `topic_categories` a ,  `schools` b, `users` c
                                        WHERE b.`id` = :id
                                        AND a.`user_id` = c.`id`
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


        $userid = "1";
        $user_name ="";
        $user_email ="";
        $ipaddress = $request->getClientIp();
        $page ="show topic";
        $url_code = $url;
        $type = $categorytype;
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

 
        $topic = ShowTopicCategory::where('url','=',$url)->where('status','=',1)->first(['id','url' , 'topic_name' , 'topicable_type']);  
        
        $id = $topic->id;
        $topic_name = $topic->topic_name; 

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`collegekey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`collegekey` as profilekey
                                        FROM `topic_categories` a ,  `colleges` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        


        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`companykey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`companykey` as profilekey
                                        FROM `topic_categories` a ,  `companies` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`doctorkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`doctorkey` as profilekey
                                        FROM `topic_categories` a ,  `doctors` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`fitnesscenterkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`fitnesscenterkey` as profilekey
                                        FROM `topic_categories` a ,  `fitness_centers` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`hotelkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`hotelkey` as profilekey
                                        FROM `topic_categories` a ,  `hotels` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`lawyerkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`lawyerkey` as profilekey
                                        FROM `topic_categories` a ,  `lawyers` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
         
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`restaurantkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`restaurantkey` as profilekey
                                        FROM `topic_categories` a ,  `restaurants` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`schoolkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '-1' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '-1' end) as user_name, 
                                    b.`schoolkey` as profilekey
                                        FROM `topic_categories` a ,  `schools` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 

         }
       
        return view('showtopicdoctor',compact('topics','url','id' ,'topic_name', 'categorytype'));
    }

    public function showdoctordetails(Request $request)
    {
 
        $url = $request->url; 
        $categorytype = $request->categorytype;  

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`collegekey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`collegekey` as profilekey
                                        FROM `topic_categories` a ,  `colleges` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        


        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`companykey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`companykey` as profilekey
                                        FROM `topic_categories` a ,  `companies` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`doctorkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`doctorkey` as profilekey
                                        FROM `topic_categories` a ,  `doctors` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`fitnesscenterkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`fitnesscenterkey` as profilekey
                                        FROM `topic_categories` a ,  `fitness_centers` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`hotelkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`hotelkey` as profilekey
                                        FROM `topic_categories` a ,  `hotels` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`lawyerkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`lawyerkey` as profilekey
                                        FROM `topic_categories` a ,  `lawyers` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
         
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`restaurantkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`restaurantkey` as profilekey
                                        FROM `topic_categories` a ,  `restaurants` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`schoolkey`  AS user_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name, 
                                    b.`schoolkey` as profilekey
                                        FROM `topic_categories` a ,  `schools` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
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
                $profilekey = $topic->profilekey;

                
            }

        
     
        return $topics;
    }

    public function showmemberdetails(Request $request)
    {
 
        $url = $request->url; 
        $categorytype = $request->categorytype;  

        if( $categorytype == 'Colleges' || $categorytype == 'colleges'){
            
            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`collegekey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `colleges` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        


        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`companykey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `companies` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`doctorkey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `doctors` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`fitnesscenterkey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `fitness_centers` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 

        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`hotelkey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `hotels` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`lawyerkey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `lawyers` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
         
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`restaurantkey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `restaurants` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
                                        AND a.`topicable_id` = b.`id`  ", ['url' => $url]);
        
 
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

            $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`schoolkey`  AS category_code,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at,
                                    (case when (a.`anonymous` = 0) then c.`user_code` else '' end) as user_code,
                                    (case when (a.`anonymous` = 0) then c.`name` else '' end) as user_name
                                        FROM `topic_category_members` a ,  `schools` b , `users` c
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = c.`id`
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

        $topic = ShowTopicCategory::where('id','=',$inptopicid)->where('topic_name','=',$inptopicname)->first(['id','user_id', 'url' , 'comments', 'topicable_type']); 

        if(isset($topic)){

            $topiccomments = $topic->comments; 
            $userid = $topic->user_id;
            $url = $topic->url;
            $topicable_type = $topic->topicable_type;

            if( $topicable_type == 'App\Doctor') { $topic_type = 'Doctors';}
            if( $topicable_type == 'App\Hotel') { $topic_type = 'hotels';}
            if( $topicable_type == 'App\Company') { $topic_type = 'Companies';}
            if( $topicable_type == 'App\School') { $topic_type = 'Schools';}
            if( $topicable_type == 'App\College') { $topic_type = 'Colleges';}
            if( $topicable_type == 'App\Restaurant') { $topic_type = 'Restaurants';}
            if( $topicable_type == 'App\Lawyer') { $topic_type = 'Lawyers';}
            if( $topicable_type == 'App\FitnessCenter') { $topic_type = 'FitnessCenters';}  

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
     
            
            \Mail::to($emailid)->queue(new PostCategoryReview($url,$inptopicname,$name,$topic_type));
        
        }else{

            $topiccomments = 0; 
        }
 
        return $postfeedback;
   
    }

    public function postreviewmember(Request $request)
    {   

        $inptopicid = $request->topicid;
        $inptopicname = $request->topicname;
        $inpreview = $request->review; 

        $topic = ShowTopicMemberCategory::where('id','=',$inptopicid)->where('topic_name','=',$inptopicname)->first(['id','user_id', 'url' , 'comments', 'topicable_type']); 

        if(isset($topic)){

            $topiccomments = $topic->comments; 
            $userid = $topic->user_id;
            $url = $topic->url;
            $topicable_type = $topic->topicable_type;

            if( $topicable_type == 'App\DoctorMember') { $topic_type = 'Doctors';}
            if( $topicable_type == 'App\HotelMember') { $topic_type = 'hotels';}
            if( $topicable_type == 'App\CompanyMember') { $topic_type = 'Companies';}
            if( $topicable_type == 'App\SchoolMember') { $topic_type = 'Schools';}
            if( $topicable_type == 'App\CollegeMember') { $topic_type = 'Colleges';}
            if( $topicable_type == 'App\RestaurantMember') { $topic_type = 'Restaurants';}
            if( $topicable_type == 'App\LawyerMember') { $topic_type = 'Lawyers';}
            if( $topicable_type == 'App\FitnessCenterMember') { $topic_type = 'FitnessCenters';}  

            $postfeedback = ShowReviewMember::create(
                [   
                    'user_id' => $userid,
                    'topic_categories_id' => $inptopicid,
                    'topic_name' => $inptopicname,
                    'review' => $inpreview,
                //    'published' => 1,
                //    'status' => 1,                                 
                ]); 

            $topicupdate = ShowTopicMemberCategory::where('id', $inptopicid)->where('topic_name','=',$inptopicname)
                        ->update(['comments' => $topiccomments + 1]);

            $userdetails = User::where('id','=',$userid)->first(['id','email','name']);

            $emailid = $userdetails->email;
            $name = $userdetails->name;
     
            
            \Mail::to($emailid)->queue(new PostCategoryMemberReview($url,$inptopicname,$name,$topic_type));
        
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

        if(isset($request->locality)){
             
            $query_option .= " AND `locality` like '%" . $request->locality . "%'" ;
        }

        if(isset($request->country)){
             
            $query_option .= " AND `country` like '%" . $request->country . "%'" ;
        }

        if(isset($request->speciality)){
             
            $query_option .= " AND `speciality` like '%" . $request->speciality . "%'" ;
        }

       


        $query_option .= " AND 1 = 1"; 


        if( $categorytype == 'Colleges'  || $categorytype == 'colleges'){
            
            $category_table = 'colleges';

            $topics = DB::select("SELECT  a.`id`,a.`collegekey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` , a.`city` ,a.`state`,a.`country` ,  a.`profilepic` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `colleges` a   
                                            WHERE a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);

        }
        if( $categorytype == 'Companies'  || $categorytype == 'companies'){

             $category_table = 'companies';

             $topics = DB::select("SELECT  a.`id`,a.`companykey` as url , a.`name` , a.`type`,   a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`website`,  a.`links`,  a.`profilepic`, a.`video`,  DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `companies` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Doctors'  || $categorytype == 'doctors' ){

             $category_table = 'doctors';

             $topics = DB::select("SELECT  a.`id`,a.`doctorkey` as url , a.`name` , a.`speciality`,  a.`gender`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` , a.`qualification`, a.`exp` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `doctors` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Fitness Centers'  || $categorytype == 'fitnesscenters'){

             $category_table = 'fitness_centers';

             $topics = DB::select("SELECT  a.`id`,a.`fitnesscenterkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `fitness_centers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Hotels'  || $categorytype == 'hotels'){

             $category_table = 'hotels';

             $topics = DB::select("SELECT  a.`id`,a.`hotelkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `hotels` a 
                                            WHERE  a.`status` = 1  " .
                                            $query_option . " 
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Lawyers'  || $categorytype == 'lawyers'){

             $category_table = 'lawyers';

             $topics = DB::select("SELECT  a.`id`,a.`lawyerkey` as url , a.`name` , a.`speciality`,  a.`gender`, a.`address` ,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country`,a.`website`,  a.`links`,  a.`profilepic`, a.`video`  , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `lawyers` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }
        if( $categorytype == 'Restaurants'  || $categorytype == 'restaurants'){

             $category_table = 'restaurants';

             $topics = DB::select("SELECT  a.`id`,a.`restaurantkey` as url , a.`name` , a.`type`,  a.`address`,  a.`locality` ,
                              a.`city` ,a.`state`,a.`country` ,a.`website`,  a.`links`,  a.`profilepic`, a.`video`, DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  
                                            FROM `restaurants` a 
                                            WHERE  a.`status` = 1   " .
                                            $query_option . "
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
        }

        if( $categorytype == 'Schools'  || $categorytype == 'schools'){ 

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


    public function showmembertopic(Request $request)
    {    
        
        $url = $request->url;
        $categorytype = $request->type;

        $userid = "1";
        $user_name ="";
        $user_email ="";
        $ipaddress = $request->getClientIp();
        $page ="show member topic";
        $url_code = $url;
        $type = $categorytype;
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



        $topic = ShowTopicMemberCategory::where('url','=',$url)->where('status','=',1)->first(['id','url' , 'topic_name' , 'topicable_type']);  
        
        $id = $topic->id;
        $topic_name = $topic->topic_name; 
       
        return view('showtopicmember',compact('url','id' ,'topic_name', 'categorytype'));
    }

    public function instagram(Request $request)
    { 

        $topics = DB::table('topics')
                        ->join('users','topics.user_id','=','users.id') 
                        ->where('topics.type','public') 
                        ->where('topics.instagram','<>', '')
                        ->where('topics.status',1) 
                        ->orderBy('topics.updated_at','desc')
                        ->select('topics.id', 'topics.url',  'topics.topic_name',  'topics.instagram',   'users.user_code' , 'users.name')
                        ->simplePaginate(20);  

        return view('instagram',compact('topics')); 
    }

    public function youtube(Request $request)
    { 
        
 
        $topics = DB::table('topics')
                        ->join('users','topics.user_id','=','users.id') 
                        ->where('topics.type','public') 
                        ->where('topics.video','<>', '')
                        ->where('topics.status',1) 
                        ->orderBy('topics.updated_at','desc')
                        ->select('topics.id', 'topics.url',  'topics.topic_name',  'topics.video',   'users.user_code' , 'users.name')
                        ->simplePaginate(20); 

        return view('youtube',compact('topics')); 
    }

    public function pictures(Request $request)
    { 
        
 
        $topics = DB::table('topics')
                        ->join('users','topics.user_id','=','users.id') 
                        ->where('topics.type','public') 
                        ->where('topics.image','<>', '')
                        ->where('topics.status',1) 
                        ->orderBy('topics.updated_at','desc')
                        ->select('topics.id', 'topics.url',  'topics.topic_name',  'topics.image',   'users.user_code' , 'users.name')
                        ->simplePaginate(20); 

        return view('pictures',compact('topics')); 
    }
}

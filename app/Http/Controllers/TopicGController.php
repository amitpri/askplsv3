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
        $users = DB::table('users')->paginate(2);
 

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

         $topics = DB::table('topics')
         				->join('users','topics.user_id','=','users.id')
         				->join('categories','topics.category_id','=','categories.id')
         				->where('topics.type','public')
         				->where('topics.sitedisplay',1)
         				->where('topics.status',1)
         				->where('topics.frontdisplay',1)
         				->orderBy('topics.updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(topics.created_at, "%Y-%m-%d") as created_at'), 'topics.id', 'topics.url', 'topics.user_id', 'topics.topic_name', 'topics.details', 'topics.video', 'topics.image', 'topics.comments', 'users.user_code' , 'categories.category', 'categories.id AS category_id', 'users.name')
         				->simplePaginate(5); 
         		 
         return view('topicsG',compact( 'categorytype', 'categories',   'topics'));
   
    }


    public function category(Request $request)
    {
 
        $categories = ShowCategory::orderBy('order','asc')->get(['id','category','status']);

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

            $topics = DB::table('colleges')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'collegekey AS url', 'name', 'type', 
         					'address', 'locality', 'city', 'state', 'country' , 'profilepic')
         				->simplePaginate(10); 

         				dd($topics);

         	$topics->withPath("?type=$categorytype");

      

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
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

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

        $categorytype = $category_table;
 
 
        return view('topicsG',compact( 'categorytype', 'categories',   'topics'));
   
    }
}

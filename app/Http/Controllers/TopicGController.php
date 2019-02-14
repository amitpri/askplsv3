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

         $topics = DB::table('topics')
         				->join('users','topics.user_id','=','users.id')
         				->join('categories','topics.category_id','=','categories.id')
         				->where('topics.type','public')
         				->where('topics.sitedisplay',1)
         				->where('topics.status',1)
         				->where('topics.frontdisplay',1)
         				->orderBy('topics.updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(topics.created_at, "%Y-%m-%d") as created_at'), 'topics.id', 'topics.url', 'topics.user_id', 'topics.topic_name', 'topics.details', 'topics.video', 'topics.image', 'topics.comments', 'users.user_code' , 'categories.category', 'categories.id AS category_id', 'users.name')
         				->simplePaginate(20); 
         		 
         return view('topicsG',compact( 'categorytype', 'categories',   'topics'));
   
    }


    public function category($type,Request $request)
    {
 
        $categories = ShowCategory::orderBy('order','asc')->get(['id','category','status']);

        //$categorytype = $request->type;

        $categorytype = $type;

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

            $topics = DB::table('colleges')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'collegekey AS url', 'name', 'type', 
         					'address', 'locality', 'city', 'state', 'country' , 'profilepic')
         				->simplePaginate(20); 

  //       	$topics->withPath("?type=$categorytype");

      

        }
        if( $categorytype == 'Companies' || $categorytype == 'companies'){

             $category_table = 'companies'; 

            $topics = DB::table('companies')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'companykey AS url', 'name', 'type', 
         				 'locality', 'city', 'state', 'country' , 'website', 'links',  'profilepic' , 'video')
         				->simplePaginate(20); 

  //       	$topics->withPath("?type=$categorytype");

        }
        if( $categorytype == 'Doctors' || $categorytype == 'doctors'){

             $category_table = 'doctors'; 

             $topics = DB::table('doctors')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'doctorkey AS url', 'name', 'speciality', 
         					'gender', 'locality', 'city', 'state', 'country' , 'qualification' , 'exp' ,'profilepic')
         				->simplePaginate(20); 

      //   	$topics->withPath("?type=$categorytype");
 
        }
        if( $categorytype == 'Fitness Centers' || $categorytype == 'fitnesscenters'){

             $category_table = 'fitness_centers'; 

             $topics = DB::table('fitness_centers')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'fitnesscenterkey AS url', 'name', 'type', 
         					'address', 'locality', 'city', 'state', 'country' , 'website', 'links',  'profilepic' , 'video')
         				->simplePaginate(20); 

    //     	$topics->withPath("?type=$categorytype");
        }
        if( $categorytype == 'Hotels' || $categorytype == 'hotels'){

             $category_table = 'hotels'; 

             $topics = DB::table('hotels')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'hotelkey AS url', 'name', 'type', 
         					'address', 'locality', 'city', 'state', 'country'  , 'website', 'links',  'profilepic' , 'video')
         				->simplePaginate(20); 

    //     	$topics->withPath("?type=$categorytype");
        }
        if( $categorytype == 'Lawyers' || $categorytype == 'lawyers'){

             $category_table = 'lawyers'; 

             $topics = DB::table('lawyers')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'lawyerkey AS url', 'name', 'speciality', 'gender' ,
         					'address', 'locality', 'city', 'state', 'country'  , 'website', 'links',  'profilepic' , 'video')
         				->simplePaginate(20); 

   //      	$topics->withPath("?type=$categorytype");
        }
        if( $categorytype == 'Restaurants' || $categorytype == 'restaurants'){

             $category_table = 'restaurants'; 

             $topics = DB::table('restaurants')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'restaurantkey AS url', 'name', 'type', 
         					'address', 'locality', 'city', 'state', 'country'  , 'website', 'links',  'profilepic' , 'video')
         				->simplePaginate(20); 

     //    	$topics->withPath("?type=$categorytype");
        }

        if( $categorytype == 'Schools' || $categorytype == 'schools'){ 

             $category_table = 'schools'; 

            $topics = DB::table('schools')
         				->where('status',1) 
         				->orderBy('top','desc')
         				->orderBy('profilepic','desc')
         				->orderBy('updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(created_at, "%Y-%m-%d") as created_at'), 'id', 'schoolkey AS url', 'name', 'type', 
         					'address', 'locality', 'city', 'state', 'country'  , 'website', 'links',  'profilepic' , 'video')
         				->simplePaginate(20); 

//         	$topics->withPath("?type=$categorytype");

         }

        $categorytype = $category_table;
 
 
        return view('topicsG',compact( 'categorytype', 'categories',   'topics'));
   
    }
    public function category2($id,Request $request)
    {
 
        $categories = ShowCategory::orderBy('order','asc')->get(['id','category','status']);

       // $categoryid = $request->id;

        $categoryid = $id;

        $categorytype = '';
 
        $topics = DB::table('topics')
         				->join('users','topics.user_id','=','users.id')
         				->join('categories','topics.category_id','=','categories.id')
         				->where('topics.type','public')
         				->where('topics.sitedisplay',1)
         				->where('topics.status',1)
         				->where('topics.frontdisplay',1)
         				->where('categories.id',$categoryid)
         				->orderBy('topics.updated_at','desc')
         				->select(DB::raw('DATE_FORMAT(topics.created_at, "%Y-%m-%d") as created_at'), 'topics.id', 'topics.url', 'topics.user_id', 'topics.topic_name', 'topics.details', 'topics.video', 'topics.image', 'topics.comments', 'users.user_code' , 'categories.category', 'categories.id AS category_id', 'users.name')
         				->simplePaginate(5); 
 
 
        return view('topicsG',compact( 'categorytype', 'categories',   'topics'));
   
    }
}

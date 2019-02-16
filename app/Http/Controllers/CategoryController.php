<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Lawyer;
use App\Company;
use App\College;
use App\School;
use App\Hotel;
use App\Restaurant; 
use App\FitnessCenter;

use App\ShowTopicCategory;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function colleges($url ){

    	$user_code = $url;
        $categorytype = "Colleges";

        $user = College::where('collegekey','=',$url)->first(['id','collegekey AS user_code', 'name']);

        $topicable = "App\College";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function companies($url ){

    	$user_code = $url;
        $categorytype = "Companies";

        $user = Company::where('companykey','=',$url)->first(['id','companykey AS user_code', 'name']);

        $topicable = "App\Company";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function doctors($url ){

    	$user_code = $url;
        $categorytype = "Doctors";

        $user = Doctor::where('doctorkey','=',$url)->first(['id','doctorkey AS user_code', 'name']);

		$topicable = "App\Doctor";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function fitnesscenters($url ){

    	$user_code = $url;
        $categorytype = "fitnesscenters";

        $user = FitnessCenter::where('fitnesscenterkey','=',$url)->first(['id','fitnesscenterkey AS user_code', 'name']);

        $topicable = "App\FitnessCenter";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function hotels($url ){

    	$user_code = $url;
        $categorytype = "Hotels";

        $user = Hotel::where('hotelkey','=',$url)->first(['id','hotelkey AS user_code', 'name']);

        $topicable = "App\Hotel";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function lawyers($url ){

    	$user_code = $url;
        $categorytype = "Lawyers";

        $user = Lawyer::where('lawyerkey','=',$url)->first(['id','lawyerkey AS user_code', 'name']);

        $topicable = "App\Lawyer";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function restaurants($url ){

    	$user_code = $url;
        $categorytype = "Restaurants";

        $user = Restaurant::where('restaurantkey','=',$url)->first(['id','restaurantkey AS user_code', 'name']);

            $topicable = "App\Restaurant";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }

    public function schools($url ){

    	$user_code = $url;
        $categorytype = "Schools";

        $user = School::where('schoolkey','=',$url)->first(['id','schoolkey AS user_code' , 'name']);

        $topicable = "App\School";


        $id = $user->id;
        $name = $user->name;
         
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

        return view('viewprofiledoctor', compact('id', 'user_code', 'categorytype', 'name'));

    }
}

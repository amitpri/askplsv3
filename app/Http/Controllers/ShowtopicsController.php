<?php

namespace App\Http\Controllers;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\DB;

 
use App\User;
use App\ShowTopic;
use App\ShowReview;

use App\Mail\PostReview;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ShowtopicsController extends Controller implements ShouldQueue
{
    public function index()
    {

        return view('showtopics');
   
    }

    public function default()
    {

        $topics = ShowTopic::where('published', '=' , 1)->where('status', '=' , 1)->where('type', '=' , 'public')->orderBy('updated_at','desc')->take(10)->get(['id','user_id','topic','name' , 'comments']);

        return $topics;
   
    }

    public function getmore(Request $request)
    {

        $row_count = $request->row_count;


        $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` ,   a.`video` ,a.`image` ,  DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                            WHERE a.`user_id` = b.`id`
                                            AND a.`category_id` = c.`id`
                                            AND a.`type` = 'public'
                                            AND a.`sitedisplay` = 1
                                            AND a.`status` = 1
                                            AND a.`frontdisplay` = 1
                                            ORDER BY a.`updated_at` DESC
                                            limit 10 offset :offset", ['offset' => $row_count]);
 

        return $topics;
   
    }

    public function getmoremessages(Request $request)
    {

        $row_count = $request->row_count;
        $topic_id = $request->id;

        $topics = ShowReview::
            //    where('published', '=' , 1)->
           //     where('status', '=' , 1)-> 
                where('topic_id' , '=' , $topic_id)->
                orderBy('updated_at','desc')->offset($row_count)->take(10)->
                get(['id','user_id','topic_name', 'review']);

        return $topics;
   
    }

    public function filtered(Request $request)
    {
 
        $topicsinput = $request->topics;

        $categoryid = $request->categoryid;

        if( $categoryid == 0){

            $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` , a.`video` ,a.`image` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                                WHERE a.`user_id` = b.`id`
                                                AND a.`category_id` = c.`id`
                                                AND a.`type` = 'public'
                                                AND a.`sitedisplay` = 1
                                                AND a.`status` = 1
                                                AND a.`frontdisplay` = 1
                                                AND a.`topic_name` like '%" . $topicsinput . "%'
                                                ORDER BY a.`updated_at` DESC
                                                limit 10");

        }else{
 

            $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` , a.`video` ,a.`image` , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                                WHERE a.`user_id` = b.`id`
                                                AND a.`category_id` = c.`id`
                                                AND a.`type` = 'public'
                                                AND a.`sitedisplay` = 1
                                                AND a.`status` = 1
                                                AND a.`frontdisplay` = 1
                                                AND c.`id` = " . $categoryid . "
                                                AND a.`topic_name` like '%" . $topicsinput . "%'
                                                ORDER BY a.`updated_at` DESC
                                                limit 10");

        }


 
                  
        return $topics;
   
    } 

    public function filteredimages(Request $request)
    {
 
        $topicsinput = $request->topics;

        $categoryid = $request->categoryid;
 
        $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` , a.`video` ,a.`image` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                            WHERE a.`user_id` = b.`id`
                                            AND a.`category_id` = c.`id`
                                            AND a.`type` = 'public'
                                            AND a.`image` is not null
                                            AND a.`sitedisplay` = 1
                                            AND a.`status` = 1
                                            AND a.`frontdisplay` = 1
                                            AND a.`topic_name` like '%" . $topicsinput . "%'
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
                  
        return $topics;
   
    } 

    public function filteredvideos(Request $request)
    {
 
        $topicsinput = $request->topics;

        $categoryid = $request->categoryid;
 
        $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` , a.`video` ,a.`image` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                            WHERE a.`user_id` = b.`id`
                                            AND a.`category_id` = c.`id`
                                            AND a.`type` = 'public'
                                            AND a.`video` is not null
                                            AND a.`sitedisplay` = 1
                                            AND a.`status` = 1
                                            AND a.`frontdisplay` = 1
                                            AND a.`topic_name` like '%" . $topicsinput . "%'
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
                  
        return $topics;
   
    } 

    public function filteredinstagram(Request $request)
    {
 
        $topicsinput = $request->topics;

        $categoryid = $request->categoryid;
 
        $topics = DB::select("SELECT  a.`id`,b.`user_code` , a.`url` , a.`user_id`,  a.`topic_name`,  a.`details` , c.`category`, c.`id` as category_id, b.`name` , a.`video` ,a.`image` , DATE_FORMAT(a.`created_at`, '%d %b %Y') created_at  , a.`comments` FROM `topics` a ,  `users` b,  `categories` c 
                                            WHERE a.`user_id` = b.`id`
                                            AND a.`category_id` = c.`id`
                                            AND a.`type` = 'public'
                                            AND a.`instagram` is not null
                                            AND a.`sitedisplay` = 1
                                            AND a.`status` = 1
                                            AND a.`frontdisplay` = 1
                                            AND a.`topic_name` like '%" . $topicsinput . "%'
                                            ORDER BY a.`updated_at` DESC
                                            limit 10");
                  
        return $topics;
   
    } 

    public function show($id)
    {
 
        $topic = ShowTopic::where('id','=',$id)->where('type','=','public')->first(['id','topic']);

        return view('showtopic',compact('topic'));
   
    } 

    public function showdetails(Request $request)
    {
 
        $url = $request->url;   

        $topics = DB::select("SELECT  a.`id`, a.`url`, a.`user_id`,  a.`topic_name`,  a.`details` 
                                , a.`image`, a.`video`, b.`name`
                                    , b.`user_code`,    DATE_FORMAT(a.`created_at`, '%d-%b-%Y') created_at, a.`instagram`
                                        FROM `topics` a ,  `users` b 
                                        WHERE a.`url` = :url
                                        AND a.`user_id` = b.`id`
                                        AND a.`type` = 'public' ", ['url' => $url]);
        

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

    public function messages(Request $request)
    {   
        $inpid = $request->id; 

        $topic = ShowTopic::where('id','=',$inpid)->first(['id' , 'reviewdisplay']);

        if( $topic->reviewdisplay == 1 ){

            $reviews = ShowReview::where('topic_id','=',$inpid)
                    ->orderBy('updated_at','desc')->take(10)
                    ->get(['id','topic_name','review','created_at']); 

        }else{

            $reviews = [
                'error_code' => 0,
            ];

        }

        

        return $reviews;
   
    } 

    public function postreview(Request $request)
    {   

        $inptopicid = $request->topicid;
        $inptopicname = $request->topicname;
        $inpreview = $request->review;

        $topic = ShowTopic::where('id','=',$inptopicid)->where('topic_name','=',$inptopicname)->first(['id','user_id', 'url' , 'comments']);

        $topiccomments = $topic->comments; 

        $userid = $topic->user_id;
        $url = $topic->url;

        $postfeedback = ShowReview::create(
                [   
                    'user_id' => $userid,
                    'topic_id' => $inptopicid,
                    'topic_name' => $inptopicname,
                    'review' => $inpreview,
                //    'published' => 1,
                //    'status' => 1,                                 
                ]);

        $topicupdate = ShowTopic::where('id', $inptopicid)->where('topic_name','=',$inptopicname)
                        ->update(['comments' => $topiccomments + 1]);


        $userdetails = User::where('id','=',$userid)->first(['id','email','name']);

        $emailid = $userdetails->email;
        $name = $userdetails->name;


//        $publishdata = [

//            'event' => "NewFeedback_$userid",
//            'data' => [
//                'topic_id' => $inptopicid,
//                'topic' => $inptopicname,
 //               'review' => $inpreview,
//            ]
            
 //       ]; 

//        Redis::publish('channel_feedback',json_encode($publishdata));
        
        \Mail::to($emailid)->queue(new PostReview($url,$inptopicname,$name));


        return $postfeedback;
   
    } 

    public function viewprofile($user_code)
    {   

        $user = User::where('user_code','=',$user_code)->first(['id','user_code']); 

        $id = $user->id; 
 
        return view('viewprofile', compact('id', 'user_code'));
   
    }

    public function viewprofiledetails(Request $request)
    {   

        $usercode = $request->usercode;
        $id = $request->id;  

        $user = User::where('user_code','=',$usercode)->where('id','=',$id)
                    ->first(['id','user_code', 'name' , 'city' , 'country' , 'profile_photo' ]); 

        return $user;
   
    }

    public function viewprofileshowtopics(Request $request)
    {   

        $usercode = $request->usercode;
        $id = $request->id;   
        
        $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at  , c.`category`
                                FROM `topics` a ,  `users` b,  `categories` c 
                                        WHERE a.`user_id` = b.`id`
                                        AND a.`category_id` = c.`id`
                                        AND a.`type` = 'public'
                                        AND b.`id` = :id
                                        AND b.`user_code` = :user_code
                                        ORDER BY a.`updated_at` DESC
                                        limit 10", ['id' => $id, 'user_code' => $usercode]);

        return $topics;
   
    }

    public function getmoretopics(Request $request)
    {   

        $row_count = $request->row_count; 
        $usercode = $request->usercode;
        $id = $request->id; 
        
        $topics = DB::select("SELECT  a.`id`,  a.`url` , a.`user_id`,  a.`topic_name`
                                    , DATE_FORMAT(a.`created_at`, '%d-%b-%Y')  created_at , c.`category`
                                FROM `topics` a ,  `users` b,  `categories` c 
                                        WHERE a.`user_id` = b.`id`
                                        AND a.`category_id` = c.`id`
                                        AND a.`type` = 'public'
                                        AND b.`id` = :id
                                        AND b.`user_code` = :user_code
                                        ORDER BY a.`updated_at` DESC
                                        limit 10 offset :offset", ['id' => $id, 'user_code' => $usercode, 'offset' => $row_count]);

        return $topics;
   
    }

    
}

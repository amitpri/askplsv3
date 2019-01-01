<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\ShowTopic;
use App\ShowReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class ShowtopicsController extends Controller
{
    public function index()
    {

        return view('showtopics');
   
    }

    public function default()
    {

        $topics = ShowTopic::where('published', '=' , 1)->where('status', '=' , 1)->where('type', '=' , 'public')->orderBy('updated_at','desc')->take(10)->get(['id','user_id','topic','name']);

        return $topics;
   
    }

    public function getmore(Request $request)
    {

        $row_count = $request->row_count;

        $topics = ShowTopic::
            //    where('published', '=' , 1)->
           //     where('status', '=' , 1)->
                where('type', '=' , 'public')->
                orderBy('updated_at','desc')->offset($row_count)->take(10)->get(['id','user_id','topic_name']);

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
        
        $topics = ShowTopic::
            //    where('published', '=' , 1)
              //  ->where('status', '=' , 1)->
                where('type', '=' , 'public')
                ->where('topic_name', 'like' , "%$topicsinput%")
                ->take(10)
                ->get(['id','topic_name','details']);
                  
        return $topics;
   
    } 

    public function show($id)
    {
 
        $topic = ShowTopic::where('id','=',$id)->where('type','=','public')->first(['id','topic']);

        return view('showtopic',compact('topic'));
   
    } 

    public function showdetails(Request $request)
    {
 
        $id = $request->id;  

        $topics = DB::select('SELECT  a.`id`, a.`user_id`,  a.`topic_name`,  a.`details` , b.`name`, a.`created_at`
                                        FROM `topics` a ,  `users` b 
                                        WHERE a.`id` = :id
                                        AND a.`user_id` = b.`id`
                                        AND a.`type` = "public" ', ['id' => $id]);
        
        
        foreach ($topics as $topic) {
        
            $id = $topic->id;
            $user_id = $topic->user_id;
            $topic_name = $topic->topic_name;
            $details = $topic->details;
            $username = $topic->name;
            $created_at = $topic->created_at; 

            
        }
     
        return $topics;
    }

    public function messages(Request $request)
    {   
        $inpid = $request->id; 

        $topic = ShowReview::where('topic_id','=',$inpid)->orderBy('updated_at','desc')->get(['id','topic_name','review','created_at']); 

        return $topic;
   
    } 

    public function postreview(Request $request)
    {   
        $inptopicid = $request->topicid;
        $inptopicname = $request->topicname;
        $inpreview = $request->review;

        $topic = ShowTopic::where('id','=',$inptopicid)->where('topic_name','=',$inptopicname)->first(['id','user_id']); 

        $userid = $topic->user_id;

        $postfeedback = ShowReview::create(
                [   
                    'user_id' => $userid,
                    'topic_id' => $inptopicid,
                    'topic_name' => $inptopicname,
                    'review' => $inpreview,
                //    'published' => 1,
                //    'status' => 1,                                 
                ]);

        $publishdata = [

            'event' => "NewFeedback_$userid",
            'data' => [
                'topic_id' => $inptopicid,
                'topic' => $inptopicname,
                'review' => $inpreview,
            ]
            
        ]; 

        Redis::publish('channel_feedback',json_encode($publishdata));

        return $postfeedback;
   
    } 

    
}

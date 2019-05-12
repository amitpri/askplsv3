<?php

namespace App\Http\Controllers;

use App\Review;
use App\ReviewCompany;
use App\Topic;
use App\TopicCompany;
use App\TopicMail;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function review($key)
    {

        $currentmenu = 'messages';  

        $topicmail = TopicMail::where('mailkey', '=' , $key)->first(['id','topic_id','profile_id','mailkey']);

        $topic = TopicCompany::where('id', $topicmail->topic_id)->first(['id','user_id','topic_name','details']);

        return view('review', compact('currentmenu','topic','topicmail'));

    }

    public function default(Request $request)
    {
  
        $user_id = $request->user_id;
        $profile_id = $request->profile_id;
        $topic_id = $request->topic_id;
        $mailkey = $request->mailkey;
        $id = $request->id;

        $feedbacks = TopicMail::where('user_id', '=' , $user_id)->
                            where('profile_id', '=' , $profile_id)->
                            where('topic_id', '=' , $topic_id)-> 
                            where('id', '=' , $id)-> 
                            first(['mailkey']);

        $mailkey2 = $feedbacks->mailkey;

        if( $mailkey2 === $mailkey){
            
            $feedbacks = ReviewCompany::where('user_id', '=' , $user_id)->
                        where('topic_id', '=' , $topic_id)-> 
                      //  where('profile_id', '=' , $profile_id)->
                        first(['review','published']);

        }      

        return $feedbacks; 

    }

    public function draft(Request $request)
    {

        $review = $request->review;
        $user_id = $request->user_id;
        $profile_id = $request->profile_id;
        $topic_id = $request->topic_id;
        $topic = $request->topic;
        $mailkey = $request->mailkey;
        $id = $request->id;

        $feedbacks = TopicMail::where('user_id', '=' , $user_id)->
                            where('profile_id', '=' , $profile_id)->
                            where('topic_id', '=' , $topic_id)-> 
                            where('id', '=' , $id)-> 
                            first(['mailkey']);

        $mailkey2 = $feedbacks->mailkey;

        if( $mailkey2 === $mailkey){
            
            $feedbacks = ReviewCompany::updateOrCreate([
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'profile_id' => $profile_id,
                    ],
                    [
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'topic_name' => $topic,
                        'profile_id' => $profile_id,
                        'review' => $review,
                        'published' => 0,
                    ]

                );

        }      
                  
        return "ok"; 

    }

    public function save(Request $request)
    {
 
        $review = $request->review;
        $user_id = $request->user_id;
        $profile_id = $request->profile_id;
        $topic_id = $request->topic_id;
        $topic = $request->topic;
        $mailkey = $request->mailkey;
        $id = $request->id;

        $feedbacks = TopicMail::where('user_id', '=' , $user_id)->
                            where('profile_id', '=' , $profile_id)->
                            where('topic_id', '=' , $topic_id)-> 
                            where('id', '=' , $id)-> 
                            first(['mailkey']);

        $mailkey2 = $feedbacks->mailkey;

        if( $mailkey2 === $mailkey){
            
            $feedbacks = ReviewCompany::updateOrCreate([
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'profile_id' => $profile_id,
                    ],
                    [
                        'user_id' => $user_id,
                        'topic_id' => $topic_id,
                        'topic_name' => $topic,
                        'profile_id' => $profile_id,
                        'review' => $review,
                        'published' => 1,
                    ]

                );

        }      
                  
        return "ok"; 

    }
}

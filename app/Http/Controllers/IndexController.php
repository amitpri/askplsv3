<?php

namespace App\Http\Controllers;

use App\ContactForm;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\City;
use App\Faq;

use App\Mail\MailContactForm;

class IndexController extends Controller
{

     use InteractsWithQueue, Queueable, SerializesModels; 

    public function index()
    {
 
        return view('index');

    }

    public function about()
    {
 
        return view('about');

    }

    public function why()
    {
 
    	return view('why');

    }

    public function solutions()
    {
 

    	return view('solutions');

    }        

    public function prices()
    {
 

    	return view('prices');

    }  

    public function support()
    {

        $faqs = FAQ::get(['id','question','answer']);

    	return view('support', compact('faqs'));

    }  

    public function supporttopics()
    {
 

        return view('supporttopics');

    }  

    public function supportreviews()
    {
 

        return view('supportreviews');

    }  

    public function supportlogin()
    {
 

        return view('supportlogin');

    }  

    public function contact()
    {
 

    	return view('contact');

    }   

    public function contactform(Request $request)
    {
        
        $name = $request->name;
        $phone = $request->phone;
        $email = $request->email;
        $message = $request->message;

        $emailid = "amitpri@gmail.com";
 

        $newcontact = ContactForm::create(
                [   
                      'name' => $name
                    , 'phone' => $phone
                    , 'email' => $email
                    , 'message' => $message 

                ]);   


        \Mail::to($emailid)->queue(new MailContactForm($name,$email,$phone, $message));

        return $newcontact->id ;

    }   

    public function toconfirm()
    {

        return view('toconfirm');

    }   
 
    public function citiesget(Request $request)
    {
        $city = $request->city; 

        $cities = City::where('name' , 'like' , "%$city%")->take(5)->get(['id', 'name', 'state' , 'country']);

   //     $appId = '';
   //     $apiKey = '';

 //       $places = \AlgoliaSearch\Client::initPlaces($appId, $apiKey);


  //      $cities = $places->search('Paris');

        return $cities;
    }


}

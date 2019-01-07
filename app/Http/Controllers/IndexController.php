<?php

namespace App\Http\Controllers;

use App\ContactForm;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

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

    public function faqs()
    {
 

    	return view('faqs');

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
}

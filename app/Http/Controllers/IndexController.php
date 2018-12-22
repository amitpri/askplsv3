<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function index()
    {
 
        return view('index');

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
}

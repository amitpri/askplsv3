<?php

Auth::routes(['verify' => true]);

Route::get('/toconfirm', 'IndexController@toconfirm');

Route::get('/home', function () {
    return redirect('/portal');
});

Route::get('/cities/get', 'IndexController@citiesget');
Route::get('/categories/gettopics', 'TopicController@gettopics');
Route::get('/workspace', 'HomeController@workspace');
Route::get('/workspace/find', 'HomeController@workspacefind');
Route::get('/workspace/get', 'HomeController@workspaceget');
Route::get('/workspace/join/{id}/{workspace}', 'HomeController@workspacejoin');
Route::get('/workspace/joined', 'HomeController@workspacejoined');
Route::get('/workspace/create', 'HomeController@workspacecreate');
Route::get('/workspace/created', 'HomeController@workspacecreated');

Route::get('/', 'TopicController@index');
Route::get('/topics', 'TopicController@topics');

Route::get('/doctors', 'TopicController@doctors');
Route::get('/hotels', 'TopicController@hotels');
Route::get('/restaurants', 'TopicController@restaurants');
Route::get('/schools', 'TopicController@schools');
Route::get('/colleges', 'TopicController@colleges');
Route::get('/companies', 'TopicController@companies');
Route::get('/lawyers', 'TopicController@lawyers');
Route::get('/fitnesscenters', 'TopicController@fitnesscenters');
Route::get('/about', 'IndexController@about');
Route::get('/solutions', 'IndexController@solutions'); 
Route::get('/why', 'IndexController@why');
Route::get('/product', 'IndexController@product'); 
Route::get('/prices', 'IndexController@prices'); 
Route::get('/contact', 'IndexController@contact'); 
Route::get('/contactform', 'IndexController@contactform'); 
Route::get('/support', 'IndexController@support');  
Route::get('/review/default', 'ReviewController@default');
Route::get('/review/draft', 'ReviewController@draft');
Route::get('/review/save', 'ReviewController@save');
Route::get('/review/{key}', 'ReviewController@review');
Route::get('/categories/default', 'TopicController@categoriesdefault');
Route::get('/t/categories', 'TopicController@topicscategories');
Route::get('/t', 'TopicController@index');
Route::get('/t/default', 'TopicController@default');
Route::get('/t/getmore', 'TopicController@getmore');
Route::get('/t/filtered', 'TopicController@filtered');
Route::get('/t/messages', 'TopicController@messages');
Route::get('/t/postfeedback', 'TopicController@postfeedback'); 
Route::get('/t/showdetails', 'TopicController@showdetails'); 
Route::get('/st/default', 'ShowtopicsController@default');
Route::get('/st/getmore', 'ShowtopicsController@getmore');
Route::get('/st/getmoremessages', 'ShowtopicsController@getmoremessages');
Route::get('/st/filtered', 'ShowtopicsController@filtered');
Route::get('/st/filteredimages', 'ShowtopicsController@filteredimages');
Route::get('/st/filteredvideos', 'ShowtopicsController@filteredvideos');
Route::get('/st/filteredinstagram', 'ShowtopicsController@filteredinstagram');
Route::get('/st/messages', 'ShowtopicsController@messages');
Route::get('/st/postreview', 'ShowtopicsController@postreview'); 
Route::get('/st/showdetails', 'ShowtopicsController@showdetails'); 
Route::get('/st/{id}', 'ShowtopicsController@show');
Route::get('/p/details', 'ShowtopicsController@viewprofiledetails');
Route::get('/p/showtopics', 'ShowtopicsController@viewprofileshowtopics');
Route::get('/p/getmore', 'ShowtopicsController@getmoretopics');

Route::get('/c/{category}/{url}/{name}', 'TopicController@categoryurl');
Route::get('/p/d/details', 'TopicController@viewprofiledoctordetails');
Route::get('/p/d/showtopics', 'TopicController@viewprofileshowtopicsdoctor');
Route::get('/st/d/showdetails', 'TopicController@showdoctordetails'); 
Route::get('/st/d/messages', 'TopicController@messagesdoctor');
Route::get('/st/d/postreview', 'TopicController@postreviewdoctor'); 
Route::get('/st/pd/showdetails', 'TopicController@showmemberdetails');  
Route::get('/st/pd/postreview', 'TopicController@postreviewmember'); 
Route::get('/t/d', 'TopicController@showdoctortopic');
Route::get('/t/d/categories', 'TopicController@topicscategoriesdoctor');
Route::get('/t/p', 'TopicController@showmembertopic');
Route::get('/t/p/categories', 'TopicController@topicscategoriesmember');
Route::get('/t/{url}/{name}', 'TopicController@show');
Route::get('/st/d/getmore', 'TopicController@getmoredoctor'); 
Route::post('/orders', 'PaymentController@store'); 
Route::post('/paytm-callback', 'PaymentController@paytmCallback');
Route::get('/payment/default', 'PaymentController@paymentdefault'); 
Route::get('/payment/redirect', 'PaymentController@paymentredirect'); 
Route::get('/category/{category}','TopicController@category'); 

Route::get('/p/{user_code}/{name}', 'ShowtopicsController@viewprofile');

Route::get('/g', 'TopicGController@index');
Route::get('/g/{type}', 'TopicGController@category'); 


Route::get('/a/{id}', 'CategoryController@colleges'); 
Route::get('/b/{id}', 'CategoryController@companies'); 
Route::get('/d/{id}', 'CategoryController@doctors'); 
Route::get('/f/{id}', 'CategoryController@fitnesscenters'); 
Route::get('/h/{id}', 'CategoryController@hotels'); 
Route::get('/l/{id}', 'CategoryController@lawyers'); 
Route::get('/r/{id}', 'CategoryController@restaurants'); 
Route::get('/s/{id}', 'CategoryController@schools'); 

Route::get('/instagram', 'TopicController@instagram'); 
Route::get('/youtube', 'TopicController@youtube'); 
Route::get('/pictures', 'TopicController@pictures');  
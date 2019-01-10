<?php

Auth::routes(['verify' => true]);

Route::get('/toconfirm', 'IndexController@toconfirm');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/workspace', 'HomeController@workspace');
Route::get('/workspace/find', 'HomeController@workspacefind');
Route::get('/workspace/get', 'HomeController@workspaceget');
Route::get('/workspace/join/{id}/{workspace}', 'HomeController@workspacejoin');
Route::get('/workspace/joined', 'HomeController@workspacejoined');
Route::get('/workspace/create', 'HomeController@workspacecreate');
Route::get('/workspace/created', 'HomeController@workspacecreated');

Route::get('/', 'TopicController@index');

Route::get('/about', 'IndexController@about');
Route::get('/solutions', 'IndexController@solutions'); 
Route::get('/why', 'IndexController@why');
Route::get('/product', 'IndexController@product'); 
Route::get('/prices', 'IndexController@prices'); 
Route::get('/faqs', 'IndexController@faqs'); 
Route::get('/contact', 'IndexController@contact'); 
Route::get('/contactform', 'IndexController@contactform'); 

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

Route::get('/t/{url}', 'TopicController@show');
 
Route::get('/st/default', 'ShowtopicsController@default');
Route::get('/st/getmore', 'ShowtopicsController@getmore');
Route::get('/st/getmoremessages', 'ShowtopicsController@getmoremessages');
Route::get('/st/filtered', 'ShowtopicsController@filtered');
Route::get('/st/messages', 'ShowtopicsController@messages');
Route::get('/st/postreview', 'ShowtopicsController@postreview'); 
Route::get('/st/showdetails', 'ShowtopicsController@showdetails'); 

Route::get('/st/{id}', 'ShowtopicsController@show');

Route::get('/p/details', 'ShowtopicsController@viewprofiledetails');
Route::get('/p/showtopics', 'ShowtopicsController@viewprofileshowtopics');
Route::get('/p/getmore', 'ShowtopicsController@getmoretopics');
Route::get('/p/{user_code}', 'ShowtopicsController@viewprofile');
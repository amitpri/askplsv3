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

Route::get('/', 'IndexController@index');
Route::get('/solutions', 'IndexController@solutions'); 
Route::get('/why', 'IndexController@why');
Route::get('/product', 'IndexController@product'); 
Route::get('/prices', 'IndexController@prices'); 
Route::get('/faqs', 'IndexController@faqs'); 
Route::get('/contact', 'IndexController@contact'); 

Route::get('/review/default', 'ReviewController@default');
Route::get('/review/draft', 'ReviewController@draft');
Route::get('/review/save', 'ReviewController@save');
Route::get('/review/{key}', 'ReviewController@review');


Route::get('/topics', 'TopicController@index');
Route::get('/topics/default', 'TopicController@default');
Route::get('/topics/getmore', 'TopicController@getmore');
Route::get('/topics/filtered', 'TopicController@filtered');
Route::get('/topics/messages', 'TopicController@messages');
Route::get('/topics/postfeedback', 'TopicController@postfeedback'); 
Route::get('/topics/showdetails', 'TopicController@showdetails'); 

Route::get('/topics/{url}', 'TopicController@show');
 
Route::get('/showtopics/default', 'ShowtopicsController@default');
Route::get('/showtopics/getmore', 'ShowtopicsController@getmore');
Route::get('/showtopics/getmoremessages', 'ShowtopicsController@getmoremessages');
Route::get('/showtopics/filtered', 'ShowtopicsController@filtered');
Route::get('/showtopics/messages', 'ShowtopicsController@messages');
Route::get('/showtopics/postreview', 'ShowtopicsController@postreview'); 
Route::get('/showtopics/showdetails', 'ShowtopicsController@showdetails'); 

Route::get('/showtopics/{id}', 'ShowtopicsController@show');
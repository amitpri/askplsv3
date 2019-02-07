<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

// Route::get('/endpoint', function (Request $request) {
//     //
// });

Route::post('/',function(Request $request){

	//\Artisan::call('cache:view');

	return [
		'success' => true,
	];
});


Route::post('/paymonthly', 'Askpls\Payments\Http\Controllers\PaymentController@store');
Route::post('/payyearly', 'Askpls\Payments\Http\Controllers\PaymentController@payyearly');

Route::post('/paytm-callback', 'Askpls\Payments\Http\Controllers\PaymentController@paytmCallback');
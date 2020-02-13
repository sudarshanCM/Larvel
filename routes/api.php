<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('cors2')->group(function(){
    //your_routes
    Route::post('shoutout',function(Request $request){
        $message = $request->input('message');
        broadcast(new ShoutOut($message))->toOthers();
        return response([],200);
    });
 });

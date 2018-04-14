<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/device',function(){
    return '{"brand":"apple"}';
});
Route::post('/fruit',function(Request $request){
        $data = $request->json()->all();
        return Response('{"gezondheid":"jazeker"}', 200);
});

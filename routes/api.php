<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//---api--使用
//此api沒有什麼安全機制純粹練習因為沒有任何的驗證方式只要知道就可以一直使用 
//如果要改可以驗證的api可以使用jwt

//得到所有資料
Route::get('/test','App\Http\Controllers\api\TestController@index')->name('api_get_all');

//指定得到一筆資料
Route::get('/test/{id}','App\Http\Controllers\api\TestController@show')->name('api_get_record');

//插入一筆資料
Route::post('/test/add/','App\Http\Controllers\api\TestController@store')->name('api_insert_record');

//更新一筆資料
Route::put('/test/{id}','App\Http\Controllers\api\TestController@update')->name('api_update_record');

//刪除一筆資料
Route::delete('/test/{id}','App\Http\Controllers\api\TestController@destroy')->name('api_delete_record');
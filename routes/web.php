<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RedisController;
use Illuminate\Support\Facades\Redis;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Route::get('/', function () {
//    return view('welcome');
//});

//根目錄直接導向login畫面
Route::get('/', [AdminController::class, 'showLoginForm'])->name('login');
//中介層Middleware認定route別名login http\middleware\authenticate.php
Route::get('/login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminController::class, 'login']);//首頁登入post方式
Route::get('/logout', [AdminController::class, 'logout']);

//-----------Redis--------------------

Route::get('/redis1', [RedisController::class, 'test_r']); //redis 測試1
//-----------SYSTEM---------------------
#region module admininfo 管理者帳號管理
//{{{
Route::get('/admininfo', [AdminController::class, 'index']); //頁面 LOAD USE GET
Route::post('/admininfo/sideajax', [AdminController::class, 'sideajax']);//LOAD DATA
Route::post('/admininfo/store', [AdminController::class, 'store']); //儲存 USE POST
Route::delete('/admininfo/delete', [AdminController::class, 'delete']); //刪除 USE delete
Route::get('/admininfo/edit', [AdminController::class, 'edit']); //編輯 LOAD USE GET
Route::post('/admininfo/update', [AdminController::class, 'update']); //更新 EDIT EXE USE POST
Route::post('/admininfo/update_pwd', [AdminController::class, 'update_pwd']); //更新使用者密碼
Route::post('/admininfo/check_username', [AdminController::class, 'check_username']); //更新 EDIT EXE USE POST
//modals 彈出新增資料對話框
Route::get("/modals/addadmininfo", [AdminController::class, 'create']);
//}}}
#endregion



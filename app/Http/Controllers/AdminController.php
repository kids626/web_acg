<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Log_loginrecord;
use App\Models\Admin;
use Illuminate\Support\Facades\DB; //ActiveRecord
use Hash; //laravel驗證密碼用 //config->app.php裡有寫別名

class AdminController extends Controller
{
    //登入畫面
    public function showLoginForm()
    {
        $this->view['permission'] = array();
        return view('login', $this->view);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('../public/login');
    }

    public function login(Request $res)
    {

        //laravel用陣列值方式丟入驗證
        //參考config/auth.php
        //官方文件實例
        // $credentials = $request->validate([
        //     'email' => ['required', 'email'],
        //     'password' => ['required'],
        // ]);
        $user = [
            'acc'      => $res->input('acc'), //帳號
            'password' => $res->input('pw') //password
        ];

        //使用laravel認證方式預設會認定Models\User
        if (Auth::attempt($user)) {
            //插入log登入資料
            if (!empty($_SERVER["HTTP_CLIENT_IP"])) {
                $ip = $_SERVER["HTTP_CLIENT_IP"];
            } elseif (!empty($_SERVER["HTTP_X_FORWARDED_FOR"])) {
                $ip = $_SERVER["HTTP_X_FORWARDED_FOR"];
            } else {
                $ip = $_SERVER["REMOTE_ADDR"];
            }
            $login_record = [
                'userid'   => $res->input('acc'),
                'ip'    => $ip
            ];
            //DB::table('financial_info')->insert($empData);
            Log_loginrecord::create($login_record); //插入登入log
            //login後的頁面
            return redirect('/admin/maininfo');
        } else {
            return redirect('/login')->with('error', '帳號或密碼錯誤');
        }

        // $acc=$res->input('acc');
        // $pw=$res->input('pw');
        // //dd($acc,$pw);
        // $chk=Admin::where('acc',$acc)->where('pw',$pw)->count();
        // //dd($chk);
        // if($chk){
        //     return redirect('/admin');
        // }else{
        //     return redirect('/login')->with('error','帳號或密碼錯誤');
        // }
    }
}

<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Test;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = Test::get()->toJson(JSON_PRETTY_PRINT);
        return response($test,200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Test=new Test;
        $Test->name = $request->name;
        $Test->age  = $request->age;
        $Test->save();

        return response()->json(["message"=>"record created"],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Test::where('id',$id)->exists()){//如果資料表存在這一筆id資料的話
            $test=Test::where('id',$id)->get()->toJSon(JSON_PRETTY_PRINT);
            return response($test,200);//第二個參數是status code
        }else{
            return response()->json(["message"=>"data not found"],404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Test::where('id',$id)->exists()){
            $test=Test::find($id);
            //下面假如沒有傳name過來更新就帶原本的$test->name值進來,如果有傳name就帶入$request->name
            $test->name=is_null($request->name)?$test->name:$request->name;
            $test->age=is_null($request->age)?$test->age:$request->age;
            $test->save();
            return response()->json(["message"=>"record updated successfully"],200);

        }else{
            return response()->json(["message"=>"data not found"],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Test::where('id',$id)->exists()){//如果該筆資料存在
            $test=Test::find($id);
            $test->delete();

            return response()->json(["message"=>"records deleted"],202);
        }else{
            return response()->json(["message"=>"data not found"],404);
        }
    }
}

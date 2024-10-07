<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Expr\FuncCall;

class RedisController extends Controller
{
    public function test_r(){
        //laravel_database_這個prefix其實是設定在上述的config/database.php中的REDIS_PREFIX

        Redis::set('q1','我已將您訂購的商品放在指定位址');
        echo Redis::get('q1');
        echo '<br>';
        Redis::set('q2','抱歉店家沒有給袋子,麻煩您要拿袋子出來裝');
        echo Redis::get('q2');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log_loginrecord extends Model
{
    use HasFactory;
    //如果你想為模型指定不同的連接，可以使用 $connection 屬性：
    //config/database.php裡面有連線可以增加
    //protected $connection = 'connection-name';
    public $timestamps = false; //跳過updated_at
    protected $table = 'hrm.login_record'; //將model原指定名稱改掉
    //想要全部開放修改，可以用guarded
    protected $guarded = [];
}

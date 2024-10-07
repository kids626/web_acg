<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;//使用軟刪除

class Test extends Model
{
    use HasFactory;
    use SoftDeletes;//使用軟刪除
    public $timestamps = false; //跳過updated_at 不然laravel會強制要有此欄位才能更新
    protected $table='web_acg.api_test';
    protected $guarded = [];
}

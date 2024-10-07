<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//將laravel核心認證的方法弄過來使用
use Illuminate\Foundation\Auth\User as Authenticatable;

//class Admin extends Model
class Admin extends Authenticatable//改繼承之Authenticatable
{
    use HasFactory;    
    protected $table = 'web_acg.admins'; //將model原指定table名改掉
    //想要全部開放修改，可以用guarded
    protected $guarded = [];

    public function getAuthPassword()
    {
        return $this->pw;
    }
}

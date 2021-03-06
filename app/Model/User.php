<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
     //关联数据表
     public $table = 'blog_homeuser';
     public $primaryKey = 'user_id';
     //允许批量操作的字段
     public $fillable = ['name', 'password', 'phone','email'];
     public $guarded = []; //不允许的字段
     //是否维护
     public $timestamps = false;
 
}

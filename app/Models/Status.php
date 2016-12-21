<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //数据表名
    protected $table = 'statuses';

    //允许更新的字段
    protected $fillable = ['content'];

    //模型间关系：一个微博属于一个用户
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

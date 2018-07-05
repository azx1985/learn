<?php

namespace App\model;

use App\Model;

class Comment extends Model
{
//    一对多反向  评论对文章
    public function articles()
    {
      return  $this->belongsTo('App\model\Article');
    }

    //一对多反向   评论对用户
    public function user()
    {
      return  $this->belongsTo('App\User');
    }
}

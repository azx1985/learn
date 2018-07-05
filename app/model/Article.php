<?php

namespace App\model;

use App\Model;

class Article extends Model
{
    //一对多的反向 文章对用户
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //一对多   文章对评论
    public function comments()
    {
        return $this->hasMany('App\model\Comment')->orderBy('created_at', 'desc');
    }
}

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

    //一对一  文章和点赞
    public function like($user_id)
    {
        return $this->hasOne('App\model\Like')->where('user_id', $user_id);
    }

    //一对一  文章有多个点赞
    public function likes()
    {
        return $this->hasMany('App\model\Like');
    }
}

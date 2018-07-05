<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
//    不允许的字段
    protected $guarded = [];
    //允许的字段
//    protected $fillable = ['name'];
}
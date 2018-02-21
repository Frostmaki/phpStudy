<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

//表->posts
class Model extends BaseModel
{
    //

    //可以注入的字段
    //protected $fillable;
    //不可以注入的字段
    protected $guarded=[];
}
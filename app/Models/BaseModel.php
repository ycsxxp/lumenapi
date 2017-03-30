<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
		// 默认情况下，Eloquent期望表中存在 created_at 和 updated_at 两个字段，字段类型为 timestamp ，如果不希望这两个字段的话，设置 $timestamps 为false
		// public $timestamps = false;
    // protected $guarded = ['id', 'updated_at'];

    // protected $dates = ['created_at', 'updated_at'];

    // protected $hidden = ['updated_at', 'deleted_at', 'extra'];
}

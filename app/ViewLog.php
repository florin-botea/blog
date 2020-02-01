<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewLog extends Model
{
    protected $fillable = ['session_id', 'slug', 'url', 'user_id', 'ip_address', 'user_agent'];
}

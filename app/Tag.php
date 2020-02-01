<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['name', 'created_by'];
    
    public function posts ()
    {
        return $this->hasManyThrough(\App\Article::class, \App\ModelHasTag::class, 'tag_id', 'id', 'id', 'model_id');
    }
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasTag extends Model
{
    protected $fillable = ['model_id', 'model', 'tag_id', 'added_by'];
}
<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
		use SoftDeletes;
	
    protected $fillable = ['slug', 'user_id', 'title', 'photo', 'description', 'sample', 'content', 'category_id'];
    
    public function tags(){
        return $this->hasManyThrough(\App\Tag::class, \App\ModelHasTag::class, 'model_id', 'id', 'id', 'tag_id');
    }
    
    public function views(){
        return $this->hasMany(\App\ViewLog::class, 'article_id');
    }
		
		public function similar() {
				return $this->hasManyThrough(\App\Article::class, \App\ModelHasTag::class, 'model_id', 'id', 'id', 'id');
		}
		
		public function category() {
				return $this->belongsTo(\App\Category::class, 'category_id')->with('parentCategory');
		}
}

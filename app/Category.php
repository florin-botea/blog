<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['index', 'name', 'category_id'];
		
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
		
		public function childrenCategories()
		{
				return $this->hasMany(Category::class)->with('categories');
		}
		
		public function parentCategory()
		{
				return $this->belongsTo(Category::class, 'category_id')->with('parentCategory');
		}
		
		public function posts()
		{
				return $this->hasMany(\App\Article::class);
		}
}

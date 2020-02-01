<?php

namespace App\Http\Middleware;

use Closure;

class UpdateCategories
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
				$category = explode('/', $request->category);
        $category = array_map(function($str){return trim($str);}, $category);
				$category_id = null;
				
				foreach ($category as $categ_item) {
						$model = \App\Category::firstOrCreate(['name' => $categ_item], ['category_id' => $category_id]);
						$category_id = $model->id;
				}
				$article = $request->all();
				$article['category_id'] = $category_id;
				$request->replace($article);
				
        return $next($request);
    }
}

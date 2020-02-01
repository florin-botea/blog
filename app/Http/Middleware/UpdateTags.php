<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UpdateTags
{	
    public function handle($request, Closure $next)
    {
				$response = $next($request);

				$article = \App\Article::where('slug', $request->slug)->first();
				if (!$article) {
						return $response;
				}
				
				\App\ModelHasTag::where('model_id', $article->id)->delete();
				
				if (!$request->tags) {
						return $response;
				}
				$tags = json_decode($request->tags, true);
				$tags = array_map( function($tag){
						return $tag['value']; 
				}, $tags);
				foreach($tags as $tag){
						$tag = \App\Tag::firstOrCreate(['name' => $tag]); //user_id = auth->>id
						\App\ModelHasTag::create([
								'model_id' => $article->id,
								'model' => get_class($article),
								'tag_id' => $tag->id,
								'added_by' => 1
						]);
				}
				
				return $response;
    }
}

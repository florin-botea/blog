<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Storage;

class SetArticlePhoto
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
				if ($request->article && $request->file_photo && $request->file('file_photo')) {
						$article = \App\Article::find($request->article);
						Storage::delete($article->photo);
				}
			
        if ($request->file_photo && $request->file('file_photo')){
						$article = $request->all();
            $article['photo'] = Storage::disk('public')->put('articlePhotos', $request->file('file_photo'));
						$request->replace($article);
				}
			
        return $next($request);
    }
}

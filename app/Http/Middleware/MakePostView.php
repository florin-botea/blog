<?php

namespace App\Http\Middleware;

use Closure;

class MakePostView
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
				$article = \App\Article::where('slug', $request->article)->withTrashed()->firstOrFail();
        if (!$article->deleted_at) {
					$article->views()->firstOrCreate([
							// 'post_id' => $post->id,
							'session_id' => \Request::getSession()->getId()
					], [
							'slug' => $article->slug,
							'url' => \Request::url(),
							'user_id' => \Auth::id(),
							'ip_address' => \Request::getClientIp(),
							'user_agent' => \Request::header('User-Agent')
					]);
				}

				$request->route()->setParameter('article', $article->id);
				
        return $next($request);
    }
}

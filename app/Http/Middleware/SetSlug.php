<?php

namespace App\Http\Middleware;

use Closure;

class SetSlug
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
				$slug = strtolower( trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $request->title), '-') );
				$request->request->add(['slug' => $slug]);

        return $next($request);
    }
}

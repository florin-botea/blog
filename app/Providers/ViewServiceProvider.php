<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ViewServiceProvider extends ServiceProvider
{

    public function boot(Request $request)
    {
        View::composer('*', function ($view) use ($request)
				{
						if ($view->getName() === 'artisan') {
								return;
						}
						$navbar_items = \App\Category::with(['childrenCategories' => function($q){
										return $q->orderBy('index');
								}])
								->where('category_id', null)->orderBy('index')->get();
					
						$last_articles = \App\Article::select('slug', 'title', 'created_at')
										->orderBy('created_at', 'desc')
										->limit(10)
										->get();

						$popular_articles = \App\Article::withCount('views')
								->orderBy('views_count', 'desc')
								->limit(10)
								->get();
						
						$archives = \App\Article::select([
								DB::raw('MONTH(created_at) AS month'),
								DB::raw('YEAR(created_at) AS year'),
								DB::raw('COUNT(*) AS count'),
						])
								->groupBy('month', 'year')
								->orderBy('month', 'DESC')
								->orderBy('year', 'DESC')
								->get();
								
						if ($request->month && $request->year){
								$from = date($request->year.'-'.$request->month.'-01');
								$to = date($request->year.'-'.$request->month.'-31');
								$articles = \App\Article::whereBetween('created_at', [$from, $to])
										->orderBy('created_at', 'desc')
										->paginate(10);
						} elseif ($request->deleted){
								$articles = \App\Article::onlyTrashed()->select('slug', 'title', 'photo', 'sample', 'created_at', 'updated_at')
										->orderBy('created_at', 'desc')
										->paginate(10);
						} elseif ($request->search) {
								$articles = \App\Article::withCount('views')
										->where('title', 'LIKE', '%'.$request->search.'%')
										->orWhere('content', 'LIKE', '%'.$request->search.'%')
										// ->select('slug', 'title', 'photo', 'sample', 'views_count', 'created_at', 'updated_at')
										->orderBy('views_count', 'desc')
										->paginate(10);
						} elseif ($request->query('category')) {
								// dd($request->query('category'));
								$category = \App\Category::where('name', $request->category)->firstOrFail();
								$articles = $category->posts()->withCount('views')->orderBy('views_count', 'desc')->paginate(10);
						} else {
								$articles = \App\Article::select('slug', 'title', 'photo', 'sample', 'created_at', 'updated_at')
										->orderBy('created_at', 'desc')
										->paginate(10);
						}
						
						$view->with(['data' => compact('navbar_items', 'articles', 'archives', 'popular_articles', 'last_articles')]);
				});
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

}

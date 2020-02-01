<?php

namespace App\Http\Controllers;

use App\Http\Validations\ValidArticle;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;

class ArticlesController extends Controller
{
		protected $article;
	
    public function __construct ()
    {
				$this->middleware('makePostView', ['only' => 'show']);//will replace article with id
				$this->middleware(['setSlug', 'updateCategories', 'setArticlePhoto', 'updateTags'], ['only' => ['store', 'update']]);
    }

    public function index()
    {
        return view('homepage');
    }

    public function create()
    {
        $form_fields = config('forms.post_form');
        
        return view('createPost')->with(['form_fields' => $form_fields]);
    }

    public function store(ValidArticle $request)
    {
        $article = \App\Article::create( $request->all() );
				
        return redirect('/');
    }

    public function show($id)
    {
        $article = \App\Article::with('tags', 'similar')
						->withTrashed()
            ->withCount('views')
            ->findOrFail($id);
        
        return view('article')->with('article', $article);
    }

    public function edit($id)
    {   
        $article = \App\Article::with('tags', 'category')
						->withTrashed()
            ->findOrFail($id);
				
        return view('editPost')->with('article', $article);
    }

    public function update(ValidArticle $request, $id)
    {
        $article = \App\Article::withTrashed()->find($id);
				$article->deleted_at = null;
        $article->update($request->all());

        return redirect( route('articles.show', ['article' => $article->slug]) );
    }

    public function destroy($id)
    {
				\App\Article::find($id)->delete();

				return redirect('/');
    }
}
@extends('layouts.managePost')

@php
		function _recursionCategoryToString ($categories, $category = []) {
			$category[] = $categories['name'];
			if ($categories['parentCategory']){
				return _recursionCategoryToString($categories['parentCategory'], $category);
			}
			return implode(' / ', array_reverse($category));
		}
		
    $tags = array_map( function($tag){
        return $tag['name'];
    }, $article['tags']->toArray());
    $tags = implode(', ',$tags);

		$article['tags'] = $tags;
		$article['category'] = _recursionCategoryToString($article['category']);
		$article['file_photo'] = $article['photo']
@endphp

@section('form')
    @component('partials.forms.form', ['action'=> route('articles.update', ['article' => $article->id]), 'attrs'=>['enctype'=>'multipart/form-data'] ])
        @method('put')
        @foreach ( config('forms.post_form') as $field )
            @formGroup(array_merge($field, [
                'value' => $article[ $field['name'] ],
								'invalid' => $errors->first($field['name'])
            ]))
        @endforeach
        <div class="mt-2 d-flex justify-content-end">
            @formSubmit(['class'=>'btn-success', 'text'=>'Submit'])
        </div>
    @endcomponent
@endsection
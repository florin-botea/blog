@extends('layouts.public')

@php
	$similar_posts = $article->similar;
@endphp

@section('content')
  <main class="main" role="main">
    <section class="mt-5">
      @include('components.articles.postItemSingleton_1', $article->toArray() )
      <hr>
			@if (!empty($similar_posts->all()))
				<section class="">
						<h2 class="similarArticles__heading"> Similar Articles </h2>
						<ul class="d-flex flex-wrap list-unstyled">
							@foreach( $similar_posts as $_article )
							<li class="col-md-4 px-0">
								@include('components.articles.postItem_2', $_article->toArray())
							</li>
							@endforeach
						</ul>
				</section>
			@endif
      <div class="px-md-5 px-3 py-3">
          @homepageSubscribeForm
          @endhomepageSubscribeForm
      </div>
    </section>
  </main>
@endsection

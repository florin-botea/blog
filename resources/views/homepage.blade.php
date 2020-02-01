@extends('layouts.public')

@php
	$articles = $data['articles']->items();
	$pagination = $data['articles']->toArray();
	unset($pagination['data']);
@endphp

@section('content')
  <main class="main" role="main">
    @if ( request()->month && request()->year )
    <div class="">
			<h1> Arhiva @lang('calendar.month.'.request()->month) {{ request()->year }} </h1>
    </div>
    @endif
		@if ( request()->deleted )
			<h1> Deleted </h1>
		@endif
		@if ( request()->search )
			<h1> Search results for "{{ request()->search }}" </h1>
		@endif
		@if ( request()->category )
			<h1>{{ request()->category }}</h1>
		@endif
		
    <div class="main__articlesList">
      <ul class="list-unstyled">
        @foreach ( $articles as $_article )
					<li class="my-4">
					@include('components.articles.postItem_1', ['article' => $_article] )
					</li>
				@endforeach
      </ul>
      <hr>
      @homepagePagination($pagination)
      @endhomepagePagination
      <hr>
			
      <div class="px-0 px-md-5">
        @homepageSubscribeForm
        @endhomepageSubscribeForm
      </div>
    </div>
  </main>
@endsection

@php
		$created_at = $article['created_at'];
		$slug = $article['slug'];
		$photo = $article['photo'];
		$title = $article['title'];
		$sample = $article['sample'];

    $date = Carbon\Carbon::parse($created_at)->toFormattedDateString();
    $now = Carbon\Carbon::now();
@endphp
<article class="card d-block p-2">
	@if ( $now->diffInDays($date) < 2 )
		<p class="float-right badge outline-success"> Fresh </p>
	@elseif( $now->diffInDays($date) < 5 )
		<p class="float-right badge outline-warning"> Nou </p>
	@endif
  <div class="col-sm p-0 mr-2 w-sm-33 float-left">
    <figure class="ratio-4x3 mb-0 bg-dark">
      <a href="{{ route('articles.show', ['article' => $slug]) }}"><img class="content" src="{{ asset('storage/'.$photo) }}"></a>
    </figure>
  </div>
  <article class="">
    <h2 class="d-inline">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $slug]) }}">{{ $title }}</a>
    </h2>
    <div class="text-sm text-muted text-right">
      <aside class="d-inline">admin</aside>
      <time class="d-inline" datetime="{{ $created_at }}">-{{ $date }}</time>
    </div>
    <div class="text-justify w-100">
      <a class="text-reset" href="{{ route('articles.show', ['article' => $slug]) }}">{{ $sample }}...</a>
    </div>
  </article>
	<div class="clearfix"></div>
</article>

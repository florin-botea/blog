<section class="lastPosts mt-4">
  <h4 class="lastPosts__heading"> Last posted </h4>
  <hr>
  <ul class="lastPosts__list mt-4">
  @foreach ($articles as $article)
    @php
      $date = Carbon\Carbon::parse($article->created_at);
    @endphp
    <li class="list-unstyled">
			<article class="">
				<h6 class="text-dark mb-0">
					<a class="article__title" href="{{ route('articles.show', ['article' => $article->slug]) }}">{{ $article->title ?? 'No title' }}</a>
				</h6>
				<small class="d-block text-right text-muted">
					<aside class="d-inline">admin</aside>
					<time class="d-inline" datetime="{{ $article->created_at }}">-{{ $date->format('D').', '.$date->format('d').' '.$date->format('M').' '.$date->format('y') }}</time>
				</small>
      </article>
    </li>
    @endforeach
  </ul>
</section>

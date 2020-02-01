<section class="mb-5">
  <h4 class="bold">{{ $title }}</h4>
  <hr class="m-1">
  <ul class="list-unstyled">
  @foreach ($articles as $article)
    @php
      $date = Carbon\Carbon::parse($article->created_at);
    @endphp
    <li class="ml-2">
			<article class="">
				<h6 class="text-dark mb-0 bold">
					<a class="text-dark" href="{{ route('articles.show', ['article' => $article->slug]) }}">{{ $article->title ?? 'No title' }}</a>
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
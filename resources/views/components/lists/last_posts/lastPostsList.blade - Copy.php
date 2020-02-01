<section class="lastPosts mt-4">
  <h2 class="lastPosts__heading"> Last posted </h2>
  <hr>
  <ul class="lastPosts__list mt-4">
  @foreach ($articles as $article)
    @php
      $date = Carbon\Carbon::parse($article->created_at);
    @endphp
    <li class="list__item">
      <article class="article article--sample article--sample-flex article--listItem">
        <div class="article__imageSection">
          <figure class="article__frame">
            <a href="{{ route('articles.show', ['article' => $article->slug]) }}"><img class="article__image" src="{{ asset('storage/'.( $article->photo??'#' )) }}"></a>
          </figure>
        </div>
        <article class="article__content">
          <h3 class="article__title">
            <a class="article__title" href="{{ route('articles.show', ['article' => $article->slug]) }}">{{ $article->title ?? 'No title' }}</a>
          </h3>
          <div class="article__meta meta">
            <aside class="article__author">admin</aside>
            <time class="article__time" datetime="{{ $article->created_at }}">-@datetime(['datetime' => $article->created_at])</time>
          </div>
        </article>
      </article>
    </li>
    @endforeach
  </ul>
</section>

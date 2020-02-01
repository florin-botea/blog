<article class="d-flex flex-wrap px-2">
  <div class="col-12 px-0">
    <figure class="ratio-4x3 bg-dark">
      <a href="{{ route('articles.show', ['article' => $slug]) }}"><img class="content" src="{{ asset('storage/'.( $photo??'#' )) }}"></a>
    </figure>
  </div>
  <article class="">
    <h6 class="bold">
      <a class="text-dark" href="{{ route('articles.show', ['article' => $slug]) }}">{{ $title ?? 'No title' }}</a>
    </h6>
    <div class="text-sm text-justify">
      <a class="text-reset" href="{{ route('articles.show', ['article' => $slug]) }}">{{ $sample ?? 'no article sample' }}...</a>
    </div>
  </article>
</article>

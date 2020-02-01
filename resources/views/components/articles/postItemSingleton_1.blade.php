@php
	
@endphp

<article class="">
  <section class="">
    @include('components.share.shareRow_1', array_flip(['facebook', 'twitter', 'email', 'whatzapp']))
  </section>
  <header class="mt-3">
    <h1 class="text-center">{{ $title ?? 'no title' }}</h1>
    <section class="text-right text-muted px-5">
      <aside class="d-inline">admin</aside>
      <time class="d-inline" datetime="{{ $created_at }}">-{{ \Carbon\Carbon::parse($created_at)->toDayDateTimeString() }}</time>
    </section>
  </header>
  <div class="px-5 py-3">
    <figure class="">
      <img class="w-100" src="{{ asset('storage/'.$photo) }}">
    </figure>
  </div>
  <div class="box">
		<blockquote class="p-3 bg-red-100 rounded text-justify text-lg">{{ $sample }}</blockquote>
	</div>
  <div class="text-justify text-lg">{!! $content !!}</div>
  <footer class="">
    <aside class="text-right">
      reads: 50
    </aside>
    <section class="">
      <h6 class="">Tags:</h6>
      @foreach ($tags as $tag)
      <span class="badge bg-gray-300 text-base">{{ $tag['name'] }}</span>
      @endforeach
    </section>
  </footer>
  <hr class="my-4">
  <section class="article__comments">
    <article class="commentsSection">
      <h2 class="commentsSection__heading"> Comments: </h2>
      <div class="fb-comments" data-href="http://localhost:8080/articles/maecenas-vida-mi-in-nisi-faucibus-dignissim" width="100%" data-width="100%" data-numposts="5"></div>
    </article>
  </section>
</article>

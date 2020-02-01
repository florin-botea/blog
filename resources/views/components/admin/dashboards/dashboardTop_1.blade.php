@php
	$article = $article ?? null;
@endphp

<nav class="navbar navbar-dark bg-dark px-5 py-1">
	<ul class="ml-auto m-0" style="list-style: none;">
		<li class="nav-item dropdown ml-auto">
			<a class="nav-link py-0 text-white" href="#" id="navbarDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<i class="fas fa-cog"></i> Posts
			</a>
			<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
				<a class="dropdown-item" href="/articles/create"><i class="fas fa-plus"></i> New post </a>
				<a class="dropdown-item {{ $article ? '' : 'disabled' }}" href="{{ $article ? route('articles.edit', ['article' => $article->id]) : '#' }}">
					<i class="fas fa-edit"></i> Edit this post
				</a>
				<a class="dropdown-item {{ $article ? '' : 'disabled' }}" href="{{ $article ? '/articles/'.$article->id.'/delete' : '#' }}" onclick="return confirm('Are you sure?')">
					<i class="fas fa-remove"></i> Delete this post
				</a>
				<a class="dropdown-item" href="/?deleted=true">
					<i class="fas fa-recycle"></i> Deleted posts
				</a>
			</div>
		</li>
	</ul>
</nav>

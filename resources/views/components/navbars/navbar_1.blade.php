<header>
	<nav class="navbar navbar-expand-md navbar-light bg-light">
		<div class="stretch">
			<a class="content" href="/">
				<img class="h-100" src="/logo.jpeg">
			</a>
		</div>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav flex-wrap ml-auto mr-md-5">
				@foreach ($navbar_items->all() as $item)
					@php
						$root = $item->childrenCategories->count() === 0;
						$dropdown = $item->childrenCategories->count() > 1;
						if (!$root && !$dropdown){
							$root = true;
							$item = $item->childrenCategories->first();
						}
					@endphp
					@if ($root)
						<li class="nav-item">
							<a class="nav-link --underline _green _rtl" href="/?category={{$item->name}}">{{$item->name}}</a>
						</li>
						@else
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{$item->name}}
								</a>
								<div class="dropdown-menu" aria-labelledby="navbarDropdown">
									@foreach ($item->childrenCategories->all() as $sub_item)
										<a class="dropdown-item --underline _green _rtl" href="/?category={{$sub_item->name}}">{{ $sub_item->name }}</a>
									@endforeach
								</div>
							</li>
					@endif
				@endforeach
			</ul>
		</div>
	</nav>
</header>
  <li class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="#">Action</a>
    <a class="dropdown-item" href="#">Another action</a>
    <a class="dropdown-item" href="#">Something else here</a>
  </li>
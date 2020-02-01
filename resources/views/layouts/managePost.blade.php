@php
	$navbar_items = $data['navbar_items'];
	$recent_posts = $data['last_articles'];
	$popular = $data['popular_articles'];
	$archives = $data['archives'];
@endphp

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content=""/>
    <link rel="stylesheet" href='/css/app.css'>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title> Blog </title>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        @include('components.admin.dashboards.dashboardTop_1', ['article' => $article ?? false])
        @include('components.navbars.navbar_1')
        
        <div class="container-fluid p-0 flex-fill pb-5">
            <div class="row mx-auto">
                <div class="col-md-8 p-0">
                    <div class="px-md-5 px-3 py-3 text-justify">
                        <hr>
						@yield('form')
						
                    </div>
                </div>
                
								<div class="col-md-4">
									@include('components.lists.posts_list_1', ['title' => 'Most read', 'articles' => $popular->all()])
									@include('components.lists.posts_list_1', ['title' => 'Last Posts', 'articles' => $recent_posts->all()])

										<div class="extras">
												<form class="d-flex">
														<input class="form-control" type="search" placeholder="Search" aria-label="Search">
														<button class="btn btn-outline-success" type="submit">Search</button>
												</form>
												<hr>
												@postsArchiveList(['archives' => $archives ?? []])
												@endpostsArchiveList
										</div>
								</div>
            </div>
        </div>
        
        @footer
        @endfooter
        
    </div>
    
    <a href="javascript:" id="return-to-top" style="display:block"><i class="fas fa-angle-up"></i></a>
		
	<script src="/js/admin.js"></script>
</body>
</html>

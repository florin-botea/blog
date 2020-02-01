<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use App\Observers\PostObserver;
use \App\Article;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
				setlocale(LC_TIME, 'ro_RO');
				\Carbon\Carbon::setLocale('ro');
        Blade::component('components.navbars.navbar_1', 'navbar');
        Blade::component('components.posts.postItem_1', 'homepagePostItem');
        Blade::component('components.paginations.pagination_1', 'homepagePagination');
        Blade::component('components.subscribe_forms.subscribeForm_1', 'homepageSubscribeForm');
        Blade::component('components.lists.popular_posts/popularPostsList_1', 'popularPostsList');
        Blade::component('components.lists.last_posts/lastPostsList', 'lastPostsList');
        
        Blade::component('components.lists.archives.postsArchiveList_1', 'postsArchiveList');
        Blade::component('components.footers.footer_1', 'footer');
        Blade::component('components.share.shareRow_1', 'share');
        Blade::component('components.posts.postItemSingleton_1', 'postItemSingleton');
        Blade::component('components.posts.postItem_2', 'similarArticle');
        Blade::component('components.admin.dashboards.dashboardTop_1', 'adminDashboard');
        Blade::component('components.admin.posts.postItemAddForm_1', 'postItemAddForm');
        Blade::component('partials.forms.form', 'form');
        Blade::include('helpers.polymorphicDatetime', 'datetime');
        Blade::include('partials.forms/formGroup', 'formGroup');
        Blade::include('partials.forms/formSubmit', 'formSubmit');
        
        // Post::observe( PostObserver::class );
        
    }
}

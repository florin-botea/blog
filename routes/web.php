<?php

use Illuminate\Support\Facades\Schema;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'ArticlesController@index');
Route::get('/archives/{month}-{year}', 'ArticlesController@index')->name('archives');

Route::resource('articles', 'ArticlesController');
Route::get('/articles/{post}/delete', 'ArticlesController@destroy');
Route::get('/articles/deleted', 'ArticlesController@deleted');

Route::get('/categories', 'CategoryController@index');
Route::post('/categories/remake', 'CategoryController@remake');
// Route::resource('tags', 'TagController');

Route::post('/upload-photo', 'CkEditorPhotosUploadController@uploadPhoto');

Route::get('/test', function(){
		Schema::table('posts', function($table)
		{
				$table->inte('category')->after('id');
		});
});

Route::get('/artisan', function () {
    return view('artisan');
});





Route::post('/artisan', function () {
    $raw = explode('--', request()->command);
    $command = trim($raw[0]);
    $flags = [];
    foreach ( array_slice($raw, 1) as $raw_flag) {
        $flag = explode('=', trim($raw_flag));
        isset($flag[1]) ? $flags['--'.$flag[0]] = $flag[1] : $command .= (' --'.$flag[0]);
    }
    \Artisan::call($command, $flags);

    return back();
});

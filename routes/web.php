<?php

use Illuminate\Support\Facades\Route;

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


Auth::routes();
Route::get('locale/{locale}', 'HomeController@changeLocale')->name('locale');
Route::middleware(['middleware' => 'set_locale'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home');
});


//admin
Route::middleware(['middleware' => 'status'])->group(function () {
    Route::get('/news/admin', 'NewsController@index')->name('home');
    //Route::get('/news/admin/create', 'CreateController@index')->name('create');

// Create Category
    Route::get('/news/admin/category/create', 'CategoryController@create')->name('category');
    Route::post('/news/admin/category/store', 'CategoryController@store')->name('create_category');
    Route::get('/news/admin/category/show/{id}', 'CategoryController@show')->name('show_category');

    // Create News
    Route::get('/news/admin/create', 'NewsController@create')->name('news');
    Route::post('/news/admin/store', 'NewsController@store')->name('create_news');
    Route::post('/news/admin/update/{id}', 'NewsController@update')->name('update_news');
    Route::get('/news/admin/show/{id}', 'NewsController@show')->name('show_news');
    Route::delete('/news/admin/delete/{id}', 'NewsController@destroy')->name('destroy_news');
    Route::get('/news/admin/delete/hashtag', 'NewsController@delete_hashtag')->name('news_delete_hashtag');
    Route::get('/news/admin/edit/{id}', 'NewsController@edit')->name('edit_news');
    Route::get('/news/admin/img/delete', 'NewsController@delete_img')->name('delete_img_news');

    //admin
    Route::get('/news/admin/user', 'AdminController@index')->name('admin');
    Route::get('/news/admin/show/{id}', 'AdminController@show')->name('admin.show');

});


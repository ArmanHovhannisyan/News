<?php


use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


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

Route::group(['middleware'=>'auth'], function () {
    Route::group(['prefix'=>'user'], function () {
        Route::get('/data.json', 'UserController@show');
    });

    Route::group(['prefix'=>'chat'], function () {
        Route::get('/', function () {
            return view('chat');
        });

        Route::get('/messages.json', 'MessageController@show');
        Route::post('/store', 'MessageController@store');
    });
});


Route::get('/email',function (){
    return new \App\Mail\WelcomeMail();
});



Auth::routes();
Route::get('locale/{locale}', 'HomeController@changeLocale')->name('locale');
Route::middleware(['middleware' => 'set_locale'])->group(function () {
    Route::get('/', 'HomeController@index')->name('home_news');
    Route::get('/single/{id}', 'HomeController@show')->name('show');
    Route::get('/user/verify/{token}', 'UserController@verifyUser');
    Route::get('/news/search/', 'HomeController@search')->name('search');

});


//admin
Route::middleware(['middleware' => 'status','set_locale'])->group(function () {
    // Create Category
    Route::resource('category','CategoryController');

    // Create News
    Route::resource('news','NewsController');
    Route::delete('/news/admin/img/delete', 'NewsController@delete_img')->name('delete_img_news');

    //admin
    Route::resource('admin_info','AdminController');
    Route::resource('user','UserController');
    Route::get('/download', 'AdminController@fileExport');
    Route::get('/admin/online/chat', 'AdminController@online')->name('admin.online');

});


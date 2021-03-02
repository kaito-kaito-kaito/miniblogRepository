<?php

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

Route::get('/', 'PostController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/users/{user}', 'UserController@show')->name('users.show');



Route::middleware('auth')->group(function(){
    Route::get('me', 'UserController@edit')->name('users.edit');
    Route::post('me', 'UserController@update')->name('users.update');
    Route::delete('me', 'UserController@delete')->name('users.delete');    
});

Route::prefix('posts')->as('posts.')->group(function(){
    Route::middleware('auth')->group(function () {
        Route::get('create', 'PostController@create')->name('create');
        Route::post('store', 'PostController@store')->name('store');
        Route::post('{post}/delete','PostController@delete')->name('delete');
        Route::post('{post}/reply','PostController@reply')->name('reply');
    });

    Route::get('{post}', 'PostController@show')->name('show');

});

    Route::middleware('auth')->prefix('bookmarks')->as('bookmarks.')->group(function () {
    Route::get('/', 'BookmarkController@index')->name('index');
    Route::post('{post}','BookmarkController@add')->name('add');
    Route::post('{post}/remove','BookmarkController@remove')->name('remove');
    });

    Route::middleware('auth')->prefix('destroy')->as('destroy.')->group(function(){
        Route::get('/','DestroyController@index')->name('index'); 
    });

    Route::middleware('auth')->prefix('notifications')->as('notifications.')->group(function () {
        Route::get('/', 'NotificationController@index')->name('index');
    });

    Route::get('/search', 'SearchController@index')->name('search.index');


    Route::middleware('auth')->group(function () {
        Route::get('/post/{post}/user/{user}/message', 'MessageController@start')->name('messages.start');
        Route::get('/message-groups', 'MessageController@index')->name('messages.index');
        Route::get('/message-group/{messageGroup}', 'MessageController@show')->name('messages.show');
        Route::post('/message-group/{messageGroup}', 'MessageController@send')->name('messages.send');
    });


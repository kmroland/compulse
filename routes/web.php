<?php

Route::get('/', 'HomeController@welcome');

Route::resource('articles', 'ArticlesController');
Route::resource('articles.images', 'ArticleImageController');
Route::resource('messages', 'MessagesController');

Auth::routes(['verify'=>true]);
Route::get('/logout', "Auth\LoginController@logout");
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/', 'AdminController@index');
});

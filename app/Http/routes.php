<?php

// Admin area
Route::group(['prefix' => 'admin','namespace' => 'Admin', 'middleware' => 'auth'], function () {
    Route::get('/','AdminController@index');
    Route::resource('post', 'PostController', ['except' => 'show']);
    Route::resource('tag', 'TagController', ['except' => 'show']);
    Route::resource('menu', 'MenuController', ['except' => 'show']);
    Route::get('upload', 'UploadController@index');
    Route::post('upload/file', 'UploadController@uploadFile');
    Route::delete('upload/file', 'UploadController@deleteFile');
    Route::post('upload/folder', 'UploadController@createFolder');
    Route::delete('upload/folder', 'UploadController@deleteFolder');
});

// Blog pages

Route::get('/', 'IndexController@index');
Route::get('post/{slug}', 'IndexController@showPost');
Route::get('tag/{tag}', 'IndexController@showTag');

Route::get('contact', 'ContactController@showForm');
Route::post('contact', 'ContactController@sendContactInfo');

Route::get('rss', 'BlogController@rss');
Route::get('sitemap.xml', 'BlogController@siteMap');



// Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');



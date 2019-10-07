<?php


Route::get('/', 'PostController@index');
Route::get('/admin/post/create', 'PostController@create')->name('post.create');
Route::get('/category/{id}', 'PostController@postsCategory')->name('showPostOfCategory');
Route::get('/post/{id}', 'PostController@show')->name('post.showContent');
Route::post('/', 'PostController@store')->name('post.store');

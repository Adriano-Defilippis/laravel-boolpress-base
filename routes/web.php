<?php


Route::get('/', 'PostController@index')->name('post.index');
Route::get('/category/{id}', 'PostController@postsCategory')->name('showPostOfCategory');
Route::get('/post/{id}', 'PostController@show')->name('post.showContent');
Route::get('/admin/post/create', 'PostController@create')->name('post.create');
Route::post('/', 'PostController@store')->name('post.store');
Route::get('/admin/post/{id}/edit', 'PostController@edit')->name('post.edit');
Route::post('/{id}', 'PostController@update')->name('post.update');
Route::get('/{id}', 'PostController@destroy')->name('post.destroy');

Route::get('/tag/{id}', 'PostController@showPostsFromTag')->name('postsFromTag.show');

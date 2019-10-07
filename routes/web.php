<?php


Route::get('/', 'PostController@index');
Route::get('/category/{id}', 'PostController@postsCategory')->name('showPostOfCategory');

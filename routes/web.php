<?php

Auth::routes();

Route::get('/', 'ItemController@index')->name('item.index');
Route::resource('item', 'ItemController')->except(['index']);
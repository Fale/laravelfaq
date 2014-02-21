<?php

Route::get('/', array('uses' => 'App\Controllers\HomeController@showIndex', 'as' => 'index'));
Route::get('tags', array('uses' => 'App\Controllers\TagController@showIndex'));
Route::get('tags/{tag}', array('uses' => 'App\Controllers\TagController@showTag'));
Route::get('{category}', array('uses' => 'App\Controllers\HomeController@showCategory'));
Route::get('{category}/{faq}', array('uses' => 'App\Controllers\HomeController@showFaq'));

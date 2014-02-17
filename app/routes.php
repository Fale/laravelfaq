<?php

Route::get('/', array('uses' => 'App\Controllers\HomeController@showIndex', 'as' => 'index'));
Route::get('{category}', array('uses' => 'App\Controllers\HomeController@showCategory'));
Route::get('{category}/{faq}', array('uses' => 'App\Controllers\HomeController@showFaq'));

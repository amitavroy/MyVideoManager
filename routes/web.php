<?php

Route::get('/', 'GuestController@welcome');
Route::get('/activate-account/{token}', 'GuestController@verify');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

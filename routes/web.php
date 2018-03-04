<?php

Route::get('/', 'GuestController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

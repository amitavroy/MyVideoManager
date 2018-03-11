<?php

use App\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\ActivateUserAccount;

Route::get('mail', function() {
    $user = User::find(2);

    // Mail::to($user)->send(new ActivateUserAccount($user));
    return new ActivateUserAccount($user);
});

Route::get('/', 'GuestController@welcome');
Route::get('/activate-account/{token}', 'GuestController@verify')->name('activate-account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

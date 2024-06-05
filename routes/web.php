<?php

use Illuminate\Support\Facades\Route;
//get pages without any data
Route::get('/', function () {
    return view('pages.frontpage');
});
Route::get('/register', function () {
    return view('pages.register');
});
Route::get('/edit-profile', function () {
    return view('pages.edit_profile');
});

//get pages with data
Route::get('/log-out', 'App\Http\Controllers\userController@log_out')->name('user.log_out');

Route::get('/log-in', 'App\Http\Controllers\userController@loginIndex')->name('user.loginIndex');
Route::get('/leaderboard', 'App\Http\Controllers\userController@index')->name('user.index');
Route::get('/friendlist', 'App\Http\Controllers\friendController@index')->name('friend.index');
//post data
Route::post('/register', 'App\Http\Controllers\userController@store')->name('user.store');
Route::post('/log-in', 'App\Http\Controllers\userController@login')->name('user.login');    
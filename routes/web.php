<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages.frontpage');
});
Route::get('/log-in', function () {
    return view('pages.log_in');
});
Route::get('/register', function () {
    return view('pages.register');
});
Route::get('/edit-profile', function () {
    return view('pages.edit_profile');
});
Route::get('/leaderboard', 'pp\Http\Controllers\userController@store')->name('user.index');
Route::post('/register', 'App\Http\Controllers\userController@store')->name('user.store');
Route::post('/log-in', 'App\Http\Controllers\userController@login')->name('user.login');    
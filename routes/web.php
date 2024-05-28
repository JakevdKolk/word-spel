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
Route::post('/register', 'App\Http\Controllers\userController@store')->name('user.store');
Route::post('/log-in', 'App\Http\Controllers\userController@index')->name('user.index');
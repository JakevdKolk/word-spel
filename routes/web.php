<?php

use Illuminate\Support\Facades\Route;
//get pages without any data
Route::get('/', function () {
    return view('pages.frontpage');
});
Route::get('/register', function () {
    return view('pages.login.register');
});
Route::get('/edit-profile', function () {
    return view('pages.profile.edit_profile');
});

//get pages with data
Route::get('/view_profile', 'App\Http\Controllers\userController@show')->name('user.show');
Route::get('/searchUser', 'App\Http\Controllers\userController@searchUser')->name('user.searchUser');
Route::get('/log-out', 'App\Http\Controllers\userController@log_out')->name('user.log_out');
Route::get('/log-in', 'App\Http\Controllers\userController@loginIndex')->name('user.loginIndex');
Route::get('/leaderboard', 'App\Http\Controllers\userController@index')->name('user.index');
Route::get('/friendlist', 'App\Http\Controllers\friendController@index')->name('friend.index');
Route::get('/profile/avatar' ,  'App\Http\Controllers\profileController@show')->name('profile.show');
//post data
Route::post('/searchUser', 'App\Http\Controllers\friendController@store')->name('friend.store');
Route::post('/register', 'App\Http\Controllers\userController@store')->name('user.store');
Route::post('/log-in', 'App\Http\Controllers\userController@login')->name('user.login');  
Route::post('/view_profile', 'App\Http\Controllers\profileController@store')->name('profile.store');  
Route::post('/edit-profile', 'App\Http\Controllers\profileController@store')->name('profile.store');  

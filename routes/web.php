<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::resources([
    'users' => 'UserController',
    'profiles' => 'ProfileController' ,
    'tweets' => 'TweetController',
    'tweet-tags' => 'TweetTagController'
]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/profiles/search/{pro}', 'ProfileController@search');
Route::get('/profiles/{user}/followlist', 'FollowController@show')->name('followlist');
Route::post('/follow/{user}', 'FollowController@store')->name('follow') ;

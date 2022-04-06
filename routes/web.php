<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('teams', TeamsController::class);


Route::middleware(['auth', 'admin'])->group(function () {

    Route::resource('user', UserController::class);
    Route::post('user/{user}/make-admin', 'UserController@makeAdmin')->name('user.make-admin');
    Route::post('user/{user}/make-writer', 'UserController@makeWriter')->name('user.make-writer');

});
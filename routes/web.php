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

use Carbon\Carbon;

Route::get('/', function () {
//    $dt = Carbon::now();
//    $sendAt = $dt->toDateString() . " " . random_int(intval(date('H')), 23) . ":" . random_int(intval(date('i')), 59);
//    dd($sendAt);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

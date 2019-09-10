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

Route::get('/home', 'HomeController@index')->name('home');


Route::post('/check', 'PartController@check')->name('check');


// done
Route::get('/code-create', 'CodeController@create')->name('code.create');
Route::post('/code-store', 'CodeController@store')->name('code.store');
Route::post('/set-code', 'CodeController@setCode')->name('set.code');
Route::get('/clear', 'CodeController@clear')->name('clear');

// report
Route::get('/gen-report', 'ReportController@generate')->name('report');
// Get all data
Route::get('/pdf', 'ReportController@pdf')->name('pdf');

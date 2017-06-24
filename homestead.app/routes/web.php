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

Route::get('/result', function () {
    return view('result');
});

Route::get('/about', function () {
    return view('about');
});


// Route::get('basic1',function(){
// 	return "hello world";
// });

// Route::any('search',function(){
// 	return view('search');
// });
Route::post('/search','searchController@index');
Route::get('/search','searchController@login');
Route::get('/search2','searchQ@searchQ');
Route::get('/return','returnResult@ReturnResult');

//Route::get('/search','searchQ@searchQ');
// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/searchQueue','searchController@searchQueue');

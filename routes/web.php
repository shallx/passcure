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

Route::resource('emails', 'EmailsController');
Route::resource('accounts', 'AccountsController');
Route::any('search', 'HomeController@search');
Route::get('/SortByCat', 'AccountsController@SortByCat');
Route::get('/SortByAcc', 'AccountsController@SortByAcc');
Route::get('/SortByEmail', 'AccountsController@SortByEmail');
Route::get('/GroupByEmail', 'AccountsController@GroupByEmail');
Route::get('/GroupByCat', 'AccountsController@GroupByCat');
Route::get('/CheckCat', 'AccountsController@CheckCatagory');
Route::post('/AddCats', 'AccountsController@AddCatagory');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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

//Get Method
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/accounts', 'AccountController@getAccount')->name('account.all');
Route::get('/accounts/{id}', 'AccountController@getAccountDetail')->name('account.detail');

//delete Account Wallet
Route::get('delete/{id}','AccountController@deleteWalletAccount')->name('account.delete');

//POST Method
// Create new Account
Route::post('/accounts', 'AccountController@createWalletAccount')->name('account.create');
// New record
Route::post('/accounts/{id}', 'RecordController@addRecord')->name('record.create');

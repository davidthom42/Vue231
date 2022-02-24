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

//Route::prefix('api')->group(function(){
    //Get contacts
    //Route::get('getContacts', 'App\Http\Controllers\ContactController@getContacts');

    //Save Contacts
    //Route::post('save_contact', 'App\Http\Controllers\ContactController@save_contact');
//});
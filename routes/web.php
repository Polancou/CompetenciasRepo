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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', function (){
    return view('inicio');
})->name('inicio');

Route::get('/pdf{id}','AdministratorController@autogeneratePDF')->name('pdf');
Route::post('/pdf{id}','AdministratorController@autogeneratePDF')->name('pdf');

Route::get('/cuatro','AdministratorController@vistacuatro')->name('vercuatro');
Route::post('/cuatro','AdministratorController@vistacuatro')->name('vercuatro');

Route::get('/temas','AdministratorController@vistatemas')->name('vertemas');
Route::post('/temas','AdministratorController@vistatemas')->name('vertemas');

Route::get('/sfirst','AdministratorController@primero')->name('first');
Route::post('/sfirts','AdministratorController@primero')->name('first');

Route::get('/detalles{id}','AdministratorController@comdetails')->name('details');
Route::post('/detalles{id}','AdministratorController@comdetails')->name('details');

Route::get('/addcomp','AdministratorController@addcomp')->name('addcomp');
Route::post('/addcomp','AdministratorController@addcomp')->name('addcomp');

Route::get('/backcomp{id}','AdministratorController@backcomp')->name('backcomp');
Route::post('/backcomp{id}','AdministratorController@backcomp')->name('backcomp');

Route::get('/addtema','AdministratorController@addtema')->name('addtema');
Route::post('/addtema','AdministratorController@addtema')->name('addtema');

Route::get('/addindicador','AdministratorController@addindicador')->name('addindicador');
Route::post('/addindicador','AdministratorController@addindicador')->name('addindicador');

Route::get('/addniveles','AdministratorController@addniveles')->name('addniveles');
Route::post('/addniveles','AdministratorController@addniveles')->name('addniveles');

Route::get('/addevidencia','AdministratorController@addevidencia')->name('addevidencia');
Route::post('/addevidencia','AdministratorController@addevidencia')->name('addevidencia');

Route::get('/addnews','AdministratorController@addnews')->name('addnews');
Route::post('/addnews','AdministratorController@addnews')->name('addnews');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/add', 'HomeController@form')->name('form');

Route::get('/dashboard', 'HomeController@dashboard')->name('ponpes.dashboard');
Route::get('/ponpes/register', 'PonpesController@register')->name('ponpes.register');
Route::post('/ponpes/register', 'PonpesController@save')->name('ponpes.save');
Route::get('/cari-ponpes', 'PonpesController@loadPonpes');
Route::get('/cari-daerah', 'PonpesController@loadDaerah');
Route::get('/santri', 'SantriController@santri')->name('santri.index');
Route::get('/santri/create', 'SantriController@create')->name('santri.create');
Route::post('/santri/store', 'SantriController@store')->name('santri.store');
Route::post('/santri/update/{id}', 'SantriController@update')->name('santri.update');
Route::delete('/santri/{id}', 'SantriController@destroy')->name('santri.destroy');
Route::get('/santri/{id}', 'SantriController@edit')->name('santri.edit');

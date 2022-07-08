<?php

use App\Http\Controllers\PublicController;
use App\Http\Controllers\LandingController;
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

Route::get('/',  [LandingController::class, 'index']);

Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');
Route::resource('/public', \App\Http\Controllers\PublicController::class);

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {
		return view('pages.upgrade');
	})->name('upgrade');
	Route::get('map', function () {
		return view('pages.maps');
	})->name('map');
	Route::get('icons', function () {
		return view('pages.icons');
	})->name('icons');
	Route::get('table-list', function () {
		return view('pages.tables');
	})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::resource('/dashboard', \App\Http\Controllers\DashboardController::class);
	Route::resource('/lapangan', \App\Http\Controllers\LapanganController::class);
	Route::resource('/jam', \App\Http\Controllers\JamController::class);
	Route::resource('/reservasi', \App\Http\Controllers\ReservasiController::class);
	Route::resource('/membership', \App\Http\Controllers\MembershipController::class);
	Route::resource('/tipe-membership', \App\Http\Controllers\TipeMembershipController::class);
	Route::resource('/invoice-membership', \App\Http\Controllers\InvoiceMembershipController::class);
});

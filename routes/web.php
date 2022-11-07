<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SAPController;
use App\Http\Controllers\TableListController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
// use App\Http\Controllers\DataController;

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

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'login'])->name('actionLogin');
Route::get('/logout',[LoginController::class,'logout'])->name('actionLogout');

Route::get('/register',[RegisterController::class,'index'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('store');
Route::get('/',[SAPController::class, 'index'])->name("SAP.index")->middleware('auth');
Route::post('/',[SAPController::class, 'store'])->name("SAP.store")->middleware('auth');
// Route::post('/search',[SAPController::class, 'showData'])->name("SAP.search");

Route::get('/table-list',[TableListController::class, 'index'])->name('tablelist')->middleware('auth');
Route::get('/table-list/search',[TableListController::class, 'search'])->name('search')->middleware('auth');
Route::post('/table-list',[TableListController::class, 'uploadFile'])->name('tablelist.uploadFile')->middleware('auth');
Route::get('/table-list/{id}',[TableListController::class, 'showFile'])->name('showFile');


// Route::get('get-file/{id}',[DataController::class, 'getFile']);
// Route::get('get-data/{id}',[DataController::class, 'getBasicData']);

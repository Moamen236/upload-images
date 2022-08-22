<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;


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

Route::get('/', 'User\HomeController@index');
Route::post('/upload', 'User\HomeController@upload')->name('upload');


Route::get('/admin', 'Admin\HomeController@index');
Route::get('/admin/download/{image}', 'Admin\HomeController@download')->name('download.image');
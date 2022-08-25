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

Route::get('/', 'User\HomeController@index')->name('home');
Route::post('/upload', 'User\HomeController@upload')->name('upload');

Route::get('/login', 'Admin\AuthController@show')->name('login');
Route::post('/login', 'Admin\AuthController@login')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin', 'Admin\HomeController@index')->name('admin.home');
    Route::delete('/admin/image/destroy/{image}', 'Admin\HomeController@destroy')->name('image.destroy');
    Route::get('/admin/download/{image}', 'Admin\HomeController@download')->name('download.image');
    Route::get('/logout', 'Admin\AuthController@logout')->name('logout');
});
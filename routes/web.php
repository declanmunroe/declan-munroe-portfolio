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

Route::post('/siteviews', 'PagesController@siteviews');
Route::get('/requestapitoken', 'PagesController@requestapitoken');
Route::post('/apitoken', 'PagesController@apitoken');

Route::get('/home', 'PagesController@home');
Route::get('/testapi', 'PagesController@testapi');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/s3/upload', 'S3Controller@upload');
Route::post('/s3/uploadimg', 'S3Controller@uploadimg');
Route::get('/s3/list', 'S3Controller@lists3');
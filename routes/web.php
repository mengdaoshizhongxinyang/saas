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

Route::post('api/store/add', 'StoreController@add');
Route::post('api/store/{id}/del', 'StoreController@del');
Route::post('api/store/{id}/update', 'StoreController@update');
Route::get('api/store/list/{createrid?}', 'StoreController@getListByCreaterID');
Route::get('api/store/{id}', 'StoreController@show');
Route::get('api/currentUser', 'StoreController@ss');


Route::post('api/user/add', 'UserController@add');
Route::post('api/user/{id}/del', 'UserController@del');
Route::post('api/user/{id}/update', 'UserController@update');
Route::get('api/user/list/{createrid?}', 'UserController@getListByCreaterID');
Route::get('api/user/{id}', 'UserController@show');

Route::post('api/industry/add', 'IndustryController@add');
Route::post('api/industry/{id}/update', 'IndustryController@update');
Route::get('api/industry', 'IndustryController@getList');
Route::get('api/industry/{id}', 'IndustryController@show');

Route::post('api/upload/add', 'UploadController@add');
//Route::post('api/industry/{id}/update', 'IndustryController@update');


Route::post('api/systemnotice/add', 'SystemnoticeController@add');
Route::post('api/systemnotice/{id}/update', 'SystemnoticeController@update');
Route::get('api/systemnotice', 'SystemnoticeController@show');
#--------------公告状态---------------
Route::post('api/noticestate/add', 'NoticestateController@add');
Route::post('api/noticestate/{id}/del', 'NoticestateController@del');
Route::post('api/noticestate/{id}/update', 'NoticestateController@update');
Route::get('api/noticestate/list/{uid}', 'NoticestateController@getListByUserId');
Route::get('api/noticestate/{id}', 'NoticestateController@show');
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




Route::post('api/systemnotice/add', 'SystemnoticeController@add');
Route::post('api/systemnotice/{id}/update', 'SystemnoticeController@update');
Route::get('api/systemnotice', 'SystemnoticeController@show');
#--------------公告状态---------------
Route::post('api/noticestate/add', 'NoticestateController@add');
Route::post('api/noticestate/{id}/del', 'NoticestateController@del');
Route::post('api/noticestate/{id}/update', 'NoticestateController@update');
Route::get('api/noticestate/list/{uid}', 'NoticestateController@getListByUserId');
Route::get('api/noticestate/{id}', 'NoticestateController@show');
#--------------员工---------------
Route::post('api/staff/add', 'StaffController@add');
Route::post('api/staff/{id}/del', 'StaffController@del');
Route::post('api/staff/{id}/update', 'StaffController@update');
Route::get('api/staff/list', 'StaffController@getList');
Route::get('api/staff/{id}', 'StaffController@show');
#--------------角色---------------
Route::post('api/role/add', 'RoleController@add');
Route::post('api/role/{id}/del', 'RoleController@del');
Route::post('api/role/{id}/update', 'RoleController@update');
Route::get('api/role/list', 'RoleController@getList');
Route::get('api/role/{id}', 'RoleController@show');
#--------------角色权限---------------
Route::post('api/rolePermission/add', 'RolePermissionController@add');
Route::post('api/rolePermission/{id}/del', 'RolePermissionController@del');
Route::post('api/rolePermission/{id}/update', 'RolePermissionController@update');
Route::get('api/rolePermission/list', 'RolePermissionController@getList');
Route::get('api/rolePermission/{id}', 'RolePermissionController@show');
#--------------权限管理---------------
Route::post('api/permission/add', 'PermissionController@add');
Route::post('api/permission/{id}/del', 'PermissionController@del');
Route::post('api/permission/{id}/update', 'PermissionController@update');
Route::get('api/permission/list', 'PermissionController@getList');
Route::get('api/permission/{id}', 'PermissionController@show');
#--------------供应商路由---------------
Route::post('api/supplier/add', 'SupplierController@add');
Route::post('api/supplier/{id}/del', 'SupplierController@del');
Route::post('api/supplier/{id}/update', 'SupplierController@update');
Route::get('api/supplier/list', 'SupplierController@getList');
Route::get('api/supplier/{id}', 'SupplierController@show');
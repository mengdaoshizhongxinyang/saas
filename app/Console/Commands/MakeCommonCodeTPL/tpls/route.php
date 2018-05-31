#--------------KF_CMT路由---------------
Route::post('KF_name/add', 'KF_NAMEController@add');
Route::post('KF_name/{id}/del', 'KF_NAMEController@del');
Route::post('KF_name/{id}/update', 'KF_NAMEController@update');
Route::get('KF_name/list', 'KF_NAMEController@getList');
Route::get('KF_name/{id}', 'KF_NAMEController@show');
<?php  
	Route::get('tai-khoan', 'UserController@read')->name('read-user');
	Route::get('them-tai-khoan', 'UserController@add')->name('add-user');
	Route::post('them-tai-khoan', 'UserController@create')->name('add-user');
	Route::get('sua-tai-khoan/{id}', 'UserController@edit')->name('edit-user');
	Route::post('sua-tai-khoan/{id}', 'UserController@update')->name('edit-user');
	Route::get('xoa-tai-khoan/{id}', 'UserController@delete')->name('del-user');
	Route::post('xoa-tai-khoan', 'UserController@del_all')->name('delall_user');
?>
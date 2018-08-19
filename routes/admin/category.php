<?php  
	Route::get('danh-muc', 'CategoryController@read')->name('read-cate');
	Route::get('them-danh-muc', 'CategoryController@add')->name('add-cate');
	Route::post('them-danh-muc', 'CategoryController@create')->name('add-cate');
	Route::get('sua-danh-muc/{id}', 'CategoryController@edit')->name('edit-cate');
	Route::post('sua-danh-muc/{id}', 'CategoryController@update')->name('edit-cate');
	Route::get('xoa-danh-muc/{id}', 'CategoryController@delete')->name('del-cate');
	Route::post('xoa-lua-chon', 'CategoryController@del_all')->name('delall-cate')
?>
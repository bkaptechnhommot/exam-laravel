<?php  
	Route::get('san-pham', 'ProductController@read')->name('read-pro');
	Route::get('them-san-pham', 'ProductController@add')->name('add-pro');
	Route::post('them-san-pham', 'ProductController@create')->name('add-pro');
	Route::get('sua-san-pham/{id}', 'ProductController@edit')->name('edit-pro');
	Route::post('sua-san-pham/{id}', 'ProductController@update')->name('edit-pro');
	Route::get('xoa-san-pham/{id}', 'ProductController@delete')->name('del-pro');
?>
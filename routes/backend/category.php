<?php 
	Route::group(['prefix' => 'admin','namespace'=>'Backend','middleware'=>'checkAdmin'], function() {
	    Route::resource('category', 'CategoryController');
	});
 ?>
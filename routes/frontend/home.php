<?php 

	Route::group(['prefix' => '','namespace'=>'Frontend'], function() {
	    Route::get('', 'HomeController@index')->name('home');
	});
 ?>
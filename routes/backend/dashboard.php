<?php 
	Route::get('admin', 'Backend\DashboardController@admin')->middleware('checkAdmin')->name('admin');
	Route::get('{slug_movie}', 'Frontend\MovieController@movie')->middleware('view_count')->name('movie');
	Route::get('admin/login', 'Backend\DashboardController@login')->name('login');
	Route::get('admin/logout', 'Backend\DashboardController@logout')->name('logout');
	Route::post('admin/post_login', 'Backend\DashboardController@post_login')->name('admin.post_login');
 ?>
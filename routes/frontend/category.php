<?php 
	Route::get('the-loai/{slug}', 'Frontend\CategoryController@cate')->name('cate');
	Route::get('quoc-gia/{slug}', 'Frontend\NationalController@national')->name('national');
	Route::get('nam/{slug}', 'Frontend\ReleaseTimeController@release_time')->name('release_time');
	Route::get('dien-vien/{slug}', 'Frontend\ActorController@actor')->name('actor');
	Route::get('phim-moi', 'Frontend\NewMovieController@new_movie')->name('new_movie');
	Route::get('phim-le', 'Frontend\TypeController@odd_movie')->name('odd_movie');
	Route::get('phim-bo', 'Frontend\TypeController@series_movie')->name('series_movie');
	Route::get('tim-kiem', 'Frontend\SearchController@search')->name('search');
	 ?>
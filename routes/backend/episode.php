<?php 
	Route::group(['prefix' => 'admin','namespace'=>'Backend','middleware'=>'checkAdmin'], function() {
	  Route::get('episode/{id_movie}', 'EpisodeController@index')->name('episode.index');
	  Route::get('episode/{id_movie}/create', 'EpisodeController@create')->name('episode.create');
	  Route::post('episode/{id_movie}/store', 'EpisodeController@store')->name('episode.store');
	  Route::get('episode/{id_movie}/edit/{id_episode}', 'EpisodeController@edit')->name('episode.edit');
	  Route::post('episode/{id_movie}/update/{id_episode}', 'EpisodeController@update')->name('episode.update');
	  Route::delete('episode/{id_movie}/destroy/{id_episode}', 'EpisodeController@destroy')->name('episode.destroy');
	})
 ?>
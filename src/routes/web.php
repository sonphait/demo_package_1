<?php
Route::group(['namespace'=>'Sonphait\Survey\Http\Controllers'], function() {
    Route::get('contact', 'ContactController@index')->name('contact');
});

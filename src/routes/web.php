<?php
Route::group(['namespace'=>'Sonphait\Survey\Http\Controllers'], function() {
    Route::get('contact', 'SurveyController@index')->name('contact');
});

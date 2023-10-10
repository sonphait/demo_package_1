<?php
Route::group(['namespace'=>'Sonphait\Survey\Http\Controllers'], function() {
    Route::get('/index', 'SurveyController@index')->name('survey.index');
    Route::get('/{surveySlug}', 'SurveyController@runSurvey')->name('survey.run');
});

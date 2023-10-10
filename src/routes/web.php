<?php
Route::group([
    'namespace'     =>  'Sonphait\Survey\Http\Controllers',
    'middleware'    =>  config('survey-manager.route_middleware'),
    'prefix'        =>  config('survey-manager.route_prefix')
], function() {
    Route::get('/index', 'SurveyController@index')->name('survey.index');
    Route::get('/{surveySlug}', 'SurveyController@runSurvey')->name('survey.run');
});

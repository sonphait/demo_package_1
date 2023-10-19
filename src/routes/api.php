<?php

Route::group(
    [
        'namespace'     =>  'Sonphait\Survey\Http\Controllers',
        'middleware'    =>  config('survey-manager.api_middleware'),
        'prefix'        =>  config('survey-manager.api_prefix'),
    ],
    function () {
        Route::post('/survey/{surveyId}/result', 'SurveyResultAPIController@store');
        Route::post('/survey/upload', 'SurveyResultAPIController@upload');
    }
);

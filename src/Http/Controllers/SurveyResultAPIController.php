<?php

namespace Sonphait\Survey\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Sonphait\Survey\Models\Survey;

class SurveyResultAPIController extends Controller
{
    /**
     * @param String $surveyId
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store($surveyId, Request $request)
    {
        $survey = Survey::find((int)$surveyId);
        if (!$survey) {
            return response()->json([
                'message'   =>  'Invalid survey id',
            ], 422);
        }
        $surveyResult = [
            'user_id'       =>  \Auth::check() ? \Auth::id() : null,
            'json'          =>  $request->all(),
            'survey_id'     =>  (int)$surveyId,
        ];
        try {
            $result = $survey->results()->create($surveyResult);
            return response()->json([
                'data'      =>  $result,
                'message'   =>  'Survey Result successfully created',
            ], 201);
        } catch (Exception $ex) { // Anything that went wrong
            return response()->json([
                'message'   =>  $ex,
            ], 500);
        }
    }
}

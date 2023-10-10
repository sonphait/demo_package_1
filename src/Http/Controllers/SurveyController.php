<?php

namespace Sonphait\Survey\Http\Controllers;

use App\Http\Controllers\Controller;
use Sonphait\Survey\Models\Survey;

class SurveyController extends Controller
{
    /**
     * Show all available survey.
     */
    public function index()
    {
        return view('survey-manager::list', [
            'surveys' => Survey::all()
        ]);
    }

    /**
     * @param $slug
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function runSurvey($slug)
    {
        $survey = Survey::where('slug', $slug)->firstOrFail();

        return view('survey-manager::survey', [
            'survey'    =>  $survey,
        ]);
    }
}

<?php

namespace Sonphait\Survey\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
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
        } catch (Exception $e) { // Anything that went wrong
            Log::error('ERROR_STORE_SURVEY_RESULT:' . $e->getMessage());
            return response()->json([
                'message'   =>  $e,
            ], 500);
        }
    }

    public function upload(Request $request) {
        $files = $request->all();
        foreach ($files as $key => $file) {
            $name = $file->getClientOriginalName();
            $fileName = time()."_".pathinfo($name,PATHINFO_FILENAME).'.'.$file->extension();
            if ($file->getSize()/1024 > config('survey-manager.max_upload_file_size')  || $file->getType() != "file" ) {
                Log::error('ERROR_VALIDATE_FILE_UPLOAD:', ['file' => $file]);
                return response()->json([
                    'message'   =>  'file is not valid',
                ], 500);
            }
            //store files in local
            $file->move(public_path('files'), $fileName);
            $files[$key] = config('survey-manager.client_domain')."files/".$fileName;

            //uncomment code to use S3 to store files
//            $filePath = 'client_files/' . $fileName;
//            try {
//                Storage::disk('s3')->put($filePath, file_get_contents($file));
//                $files[$key] = config('survey-manager.client_s3_url')."client_files/".$fileName;
//            } catch (Exception $e) {
//                Log::error('ERROR_S3_UPLOAD_FILE:' . $e->getMessage());
//                return response()->json([
//                    'message'   =>  $e,
//                ], 500);
//            }
        }
        return $files;
    }
}

<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey | {{$survey->name}}</title>
    <meta name="csrf-token" content="{{csrf_token()}}">
    <!-- ... -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <link href="{{ asset('vendor/survey-manager/css/defaultV2.css') }}" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="{{ asset('vendor/survey-manager/js/survey.jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/survey-manager/js/survey.i18n.min.js') }}"></script>

    <!-- ... -->
    <script src="{{ asset('vendor/survey-manager/js/show_form.js') }}"></script>
</head>
<body>
<div class="container">
    <h1 class="panel panel-default center-block">
        <h1>{{$survey->name}}</h1>
        <a href="{{ route('survey.index') }}">
            <button>
                Back to list surveys
            </button>
        </a>
        <div id="surveyContainer"></div>
        <input type="hidden" id="survey_data" value="{{ json_encode($survey->json) }}">
        <input type="hidden" id="survey_id" value="{{ json_encode($survey->id) }}">
        <input type="hidden" id="survey_slug" value="{{ $survey->slug }}">
</div>
</div>
</body>
</html>
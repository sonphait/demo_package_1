<!doctype html>
<html lang="{{app()->getLocale()}}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Survey List</title>
    <style>
        table, th, td {
            border:1px solid black;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="container">
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                <th>Created at</th>
                <th></th>
            </tr>
            <tbody>

            @foreach ($surveys as $row)
            <tr>
                <td>{{ $row -> id }}</td>
                <td>{{ $row -> name }}</td>
                <td>{{ $row -> slug }}</td>
                <td>{{ $row -> created_at }}</td>
                <td>
                    <a href="{{ route('survey.run', [ 'surveySlug' => $row->slug]) }}">
                        <button>
                            Do survey
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
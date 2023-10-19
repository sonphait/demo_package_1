1) In your terminal:

``` bash
$ composer require sonph/survey
```

2) Publish the config file:

```bash
php artisan vendor:publish --provider="Sonphait\Survey\SurveyServiceProvider"
```

3) Run migration:
```bash
   php artisan migrate
```

4) Run seeder:
```bash
   php artisan db:seed --class=SurveySeeder
```

5) [optional] Change values in config/survey-manager.php (route prefix, middleware)

6) [optional] If you want to test file uploaded in survey by user from admin code, do the following steps:
    1. Uncomment save file to local code in js/show_form.js
    2. Change the domain value to your current one (Ex: http://127.0.0.1:8001/) in config/survey-manager.php
    * Note: To show files uploaded from user on local admin survey, you have to run survey_admin code and survey_client code simultaneously
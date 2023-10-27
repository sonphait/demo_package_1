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

5) View index page: "/survey/index"

6) [optional] Change values in config/survey-manager.php (route prefix, middleware, file upload max size, ...)

7) [optional] To test file uploaded by user, uncomment save file to S3 code in public/vendor/survey-manager/js/show_form.js. The File type question itself must have 'storeDataAsText' as false (see admin README)
* Note: To use S3 as file storage, change value of 'client_s3_url' and 'client_s3_folder' in config/survey-manager.php to where you save file on S3
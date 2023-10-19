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

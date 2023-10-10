1) In your terminal:

``` bash
$ composer require sonph/survey
```

2) Publish the config file & run the migrations

```bash
php artisan vendor:publish --provider="Sonphait\Survey\SurveyServiceProvider"
```

3) [optional] Change values in config/survey-manager.php (route prefix, middleware)

## License

MIT. Please see the [license file](license.md) for more information.
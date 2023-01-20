# E-goi/sdk-php Wrapper for Laravel

[![Latest Version on Packagist](https://img.shields.io/packagist/v/bernardinosousa/egoi-laravel.svg?style=flat-square)](https://packagist.org/packages/bernardinosousa/egoi-laravel)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/bernardinosousa/egoi-laravel/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/bernardinosousa/egoi-laravel/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/bernardinosousa/egoi-laravel/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/bernardinosousa/egoi-laravel/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/bernardinosousa/egoi-laravel.svg?style=flat-square)](https://packagist.org/packages/bernardinosousa/egoi-laravel)

Created this package on my free time to improve developer experience using Laravel/E-goi  
I´m not affilied to [E-goi](https://www.e-goi.com/)

## Installation

You can install the package via composer:

```bash
composer require bernardinosousa/egoi-laravel
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="egoi-laravel-config"
```

Add to .env file:

```bash
EGOI_API_KEY="YOUR_API_KEY"
```

## Usage

```php
use Bernardinosousa\EgoiLaravel\Facades\EgoiLaravel;

//Get All Contacts from List
try {
    $listId = 1;

    $contactListResponse = EgoiLaravel::api('contacts')->getAllContacts(
        $listId
    );

    dump($contactResponse);
} catch (\Exception $e) {
    dump('Exception when getting all contacts from list: ', $e->getMessage());
}

//Get Contact Information from List Id and Contact Id
try {
    $listId = 1;

    $contactId = "f51f0117ba";

    $contactResponse = EgoiLaravel::api('contacts')->getContact(
        $contactId, 
        $listId
    );

    dump($contactResponse);
} catch (\Exception $e) {
    dump('Exception when getting contact information: ', $e->getMessage());
}

//Create Contact from List
try {
    $contactBaseExtraPost = new \EgoiClient\EgoiModel\ContactBaseExtraPost([
        'base' => [
            "status" => "active",
            "first_name" => "John",
            "last_name" => "Doe",
            "birth_date" => "1975-01-10",
            "language" => "en",
            "email" => "example@e-goi.com",
            //"cellphone" => "351-300404336",
            //"phone" => "351-300404336",
            "push_token_android" => [],
            "push_token_ios" => []
        ]
    ]);

    $listId = 1;

    $contactResponse = EgoiLaravel::api('contacts')->createContact(
        $listId, 
        $contactBaseExtraPost
    );

    dump($contactResponse);
} catch (\Exception $e) {
    dump('Exception when creating contact from list: ', $e->getMessage());
}

```

If you would like to have more examples, see [E-goi sdk-php endpoints](https://github.com/E-goi/sdk-php#api-endpoints)  

## Todo

- AdvancedReportsApi
- AutomationsApi
- CNamesApi
- CampaignGroupsApi
- CampaignsApi
- ConnectedSitesApi
- EcommerceApi
- EcommerceActivityApi
- EmailApi
- FieldsApi
- ListsApi
- MyAccountApi
- OperationsApi
- PingApi
- PushApi
- ReportsApi
- SegmentsApi
- SendersApi
- SmartSmsApi
- SmsApi
- SuppressionListApi
- TagsApi
- TrackEngageApi
- UsersApi
- UtilitiesApi
- VoiceApi
- WebHooksApi
- WebpushApi

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Bernardino Sousa](https://github.com/bernardinosousa)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

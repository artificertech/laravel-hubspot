# Laravel HubSpot

[![Latest Version on Packagist](https://img.shields.io/packagist/v/artificertech/laravel-hubspot.svg?style=flat-square)](https://packagist.org/packages/artificertech/laravel-hubspot)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/artificertech/laravel-hubspot/run-tests?label=tests)](https://github.com/artificertech/laravel-hubspot/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/artificertech/laravel-hubspot/Fix%20PHP%20code%20style%20issues?label=code%20style)](https://github.com/artificertech/laravel-hubspot/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/artificertech/laravel-hubspot.svg?style=flat-square)](https://packagist.org/packages/artificertech/laravel-hubspot)

A laravel wrapper for the https://github.com/HubSpot/hubspot-api-php package

## Installation

You can install the package via composer:

```bash
composer require artificertech/laravel-hubspot
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-hubspot-config"
```

This is the contents of the published config file:

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Default Hubspot Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the hubspot connections below you wish
    | to use as your default connection for all HubSpot work. Of course
    | you may use many connections at once using the HubSpot library.
    |
    */

    'default' => env('HUBSPOT_CONNECTION', 'hubspot'),

    /*
    |--------------------------------------------------------------------------
    | HubSpot Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the HubSpot connections setup for your application.
    |
    */

    'connections' => [
        'hubspot' => [
            'token' => env('HUBSPOT_ACCESS_TOKEN'),
        ],
    ],

];
```

## Usage

see [hubspot-api-php](https://github.com/HubSpot/hubspot-api-php) for usage

```php
/** @var \HubSpot\Discovery\Discovery */
$hubspotDiscovery = \Artificertech\HubSpot\Facades\HubSpot::connection();

/** @var \HubSpot\Discovery\Crm\Discovery */
$crm = $hubspotDiscovery->crm();

/** @var \HubSpot\Discovery\Crm\Discovery */
$crm = \Artificertech\HubSpot\Facades\HubSpot::crm();
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed
recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report
security vulnerabilities.

## Credits

- [Cole Shirley](https://github.com/coleshirley)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more
information.

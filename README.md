<p align="center">
<a href="https://www.digicelgroup.com/ht/en/moncash/business.html" target="_blank">
<img style="box-shadow: 2px 2px 1px #000000" src="https://www.digicelgroup.com/etc/designs/haiti-en-moncash/_jcr_content/global/headerLogo.asset.spool/MonCash_Logo-180-90-white.png" width="200"></a></p>

<p align="center">
    <a href="/README.md">EN</a> • <a href="/README.fr.md">FR</a> • <a href="/README.ht.md">HT</a>
</p>

🚧 Work in Progress - Do not use 🚧

# A Laravel package to communicate with Digicel Moncash Rest API version 1
[![Latest Version on Packagist](https://img.shields.io/packagist/v/fruitsbytes/laravel-moncash.svg?style=flat-square)](https://packagist.org/packages/fruitsbytes/laravel-moncash)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/fruitsbytes/laravel-moncash/run-tests?label=tests)](https://github.com/fruitsbytes/laravel-moncash/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/fruitsbytes/laravel-moncash/Check%20&%20fix%20styling?label=code%20style)](https://github.com/fruitsbytes/laravel-moncash/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/fruitsbytes/laravel-moncash.svg?style=flat-square)](https://packagist.org/packages/fruitsbytes/laravel-moncash)

This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.


## Installation

You can install the package via composer:

```shell
composer require fruitsbytes/laravel-moncash
```

You can publish and run the migrations with:

```shell
php artisan vendor:publish --tag="mon-cash-migrations"
php artisan migrate
```

You can publish the config file with:

```shell
php artisan vendor:publish --tag="mon-cash-config"
```

This is the contents of the published config file:

```php
return [

    'client_id'     => env( 'MON_CASH_CLIENT_ID', '' ),
    'client_secret' => env( 'MON_CASH_CLIENT_SECRET', '' ),
    'mode'          => env( 'MON_CASH_MODE', 'sandbox' ),
];

```

Prerequiste
-----



## Usage
You need to set the `client_id` and `client_secret` in the `./config/moncash.php` file.
<b>Note:</b> Don't forget to switch to production mode when ready


```php
$moncash = new FruitsBytes\LaravelMoncash();

```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.


## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

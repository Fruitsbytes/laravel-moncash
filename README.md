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

```bash
composer require fruitsbytes/laravel-moncash
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --tag="laravel-moncash-migrations"
php artisan migrate
```

You can publish the config file with:

```bash
php artisan vendor:publish --tag="laravel-moncash-config"
```

This is the contents of the published config file:

```php
return [

    'client_id'     => env( 'MON_CASH_CLIENT_ID', '' ),
    'client_secret' => env( 'MON_CASH_CLIENT_SECRET', '' ),
    'mode'          => env( 'MON_CASH_MODE', 'sandbox' ),
    'endpoint'          => [
        'sandbox'    => 'https://sandbox.moncashbutton.digicelgroup.com',
        'production' => 'https://moncashbutton.digicelgroup.com'
    ]
];

```

Prerequiste
-----

<h3>Create an account</h3>

1) Go to the [Moncash Sanbox portal](https://sandbox.moncashbutton.digicelgroup.com/Moncash-business/New)
2) Add a new Buisiness
3) Retrieve the <b>clientID</b> and <b>clientSecret</b>

Online videos:
- [Kijan pou mete Moncash sou sit ou pou w vann](https://youtu.be/lE3ejFT11_w)
- [Comment Intégrer l'onglet Moncash Pay à votre commerce online - Technopro Web](https://youtu.be/NiWYrO_E5ik)  (🕊 Osirus)

<p align="center">
<a href="https://www.digicelgroup.com/ht/en/moncash/business.html" target="_blank">
<img style="box-shadow: 2px 2px 1px #000000" 
src="https://raw.githubusercontent.com/Fruitsbytes/php-moncash/main/demo_1.png" width="700"></a></p>



## Usage
You need to set the `client_id` and `client_secret` in the `./config/moncash.php` file.
<b>Note:</b> Don't forget to switch to production mode when ready


```php
$moncash = new Fruitsbytes\LaravelMoncash();

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

## Credits

- [Jeffrey N. Carre](https://github.com/Fruitsbytes)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.



# Other Moncash projects

## PHP
The core library used to make this package: [Fruitsbytes/php-moncash](https://github.com/Fruitsbytes/php-moncash)

## Wordpress
For Woocommerce-Wordpress : [ecelestin/ecelestin-Moncash-sdk-php](https://github.com/ecelestin/ecelestin-Moncash-sdk-php
)

## NodeJS

- [Fruitsbytes/nodejs-moncash]() _(with Typescript support)_
- [ecelestin-Moncash-sdk-nodejs](https://github.com/ecelestin/ecelestin-Moncash-sdk-nodejs)

## Web SDK

### Javascript ES6
- [Fruitsbytes/js-moncash-core]() _(with Typescript support)_

### React
- [Fruitsbytes/moncash/react-moncash]()

### Angular
- [Fruitsbytes/ng-moncash]()

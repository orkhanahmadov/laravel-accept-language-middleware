# Laravel "Accept-Language" middleware

[![Latest Stable Version](https://poser.pugx.org/orkhanahmadov/laravel-accept-language-middleware/v/stable)](https://packagist.org/packages/orkhanahmadov/laravel-accept-language-middleware)
[![Latest Unstable Version](https://poser.pugx.org/orkhanahmadov/laravel-accept-language-middleware/v/unstable)](https://packagist.org/packages/orkhanahmadov/laravel-accept-language-middleware)
[![Total Downloads](https://img.shields.io/packagist/dt/orkhanahmadov/laravel-accept-language-middleware)](https://packagist.org/packages/orkhanahmadov/laravel-accept-language-middleware)
[![GitHub license](https://img.shields.io/github/license/orkhanahmadov/laravel-accept-language-middleware.svg)](https://github.com/orkhanahmadov/laravel-accept-language-middleware/blob/master/LICENSE.md)

[![Build Status](https://travis-ci.org/orkhanahmadov/laravel-accept-language-middleware.svg?branch=master)](https://travis-ci.org/orkhanahmadov/laravel-accept-language-middleware)
[![Test Coverage](https://api.codeclimate.com/v1/badges/56bd16c9d7eb462261d3/test_coverage)](https://codeclimate.com/github/orkhanahmadov/laravel-accept-language-middleware/test_coverage)
[![Maintainability](https://api.codeclimate.com/v1/badges/56bd16c9d7eb462261d3/maintainability)](https://codeclimate.com/github/orkhanahmadov/laravel-accept-language-middleware/maintainability)
[![Quality Score](https://img.shields.io/scrutinizer/g/orkhanahmadov/laravel-accept-language-middleware.svg)](https://scrutinizer-ci.com/g/orkhanahmadov/laravel-accept-language-middleware)
[![StyleCI](https://github.styleci.io/repos/227684667/shield?branch=master)](https://github.styleci.io/repos/227684667)

Laravel middleware for automatically setting application locale based on [HTTP "Accept-Language"](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Language) header

## Requirements

- PHP **8.0** or higher.
- Laravel **^8.0**, **^9.0** or higher

## Installation

You can install the package via composer:

```bash
composer require orkhanahmadov/laravel-accept-language-middleware
```

## Usage

Register `\Orkhanahmadov\LaravelAcceptLanguageMiddleware\Middleware::class` middleware in application's HTTP Kernel.

You can install it as global middleware in Kernel's `$middleware` property:

``` php
protected $middleware = [
    ...
    \Orkhanahmadov\LaravelAcceptLanguageMiddleware\Middleware::class
];
```

You can install it to specific middleware groups in Kernel's `$middlewareGroups` property:

``` php
protected $middlewareGroups = [
    'web' => [
        ...
        \Orkhanahmadov\LaravelAcceptLanguageMiddleware\Middleware::class
    ]
];
```

Or you can install is as route middleware in Kernel's `$routeMiddleware` and use it manually in routes:

Kernel:

``` php
protected $routeMiddleware = [
    ...
    'accept-language' => \Orkhanahmadov\LaravelAcceptLanguageMiddleware\Middleware::class
];
```

Route file
``` php
Route::middleware(['accept-language'])->get('/', 'MyController@index');
```

### Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email ahmadov90@gmail.com instead of using the issue tracker.

## Credits

- [Orkhan Ahmadov](https://github.com/orkhanahmadov)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

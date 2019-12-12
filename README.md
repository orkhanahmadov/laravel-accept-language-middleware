# WIP

# Laravel "Accept-Language" middleware

[![Latest Stable Version](https://poser.pugx.org/orkhanahmadov/laravel-accept-language-middleware/v/stable)](https://packagist.org/packages/orkhanahmadov/laravel-accept-language-middleware)
[![Latest Unstable Version](https://poser.pugx.org/orkhanahmadov/laravel-accept-language-middleware/v/unstable)](https://packagist.org/packages/orkhanahmadov/laravel-accept-language-middleware)
[![Total Downloads](https://img.shields.io/packagist/dt/orkhanahmadov/laravel-accept-language-middleware)](https://packagist.org/packages/orkhanahmadov/laravel-accept-language-middleware)
[![GitHub license](https://img.shields.io/github/license/orkhanahmadov/laravel-accept-language-middleware.svg)](https://github.com/orkhanahmadov/laravel-accept-language-middleware/blob/master/LICENSE.md)

Laravel middleware for automatically setting application locale based on [HTTP "Accept-Language"](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Accept-Language) header

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

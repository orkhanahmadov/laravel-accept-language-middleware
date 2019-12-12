<?php

namespace Orkhanahmadov\LaravelAcceptLanguageMiddleware\Tests;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Orkhanahmadov\LaravelAcceptLanguageMiddleware\HttpLocaleMiddleware;

class HttpLocaleMiddlewareTest extends TestCase
{
    public function test_with_single_locale()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('es', App::getLocale());
    }

    public function test_with_single_with_country()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-US'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('es-US', App::getLocale());
    }

    public function test_with_single_with_country_and_quality_value()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-US;q=0.5'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('es-US', App::getLocale());
    }

    public function test_with_multiple_locales()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es, de'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('es', App::getLocale());
    }

    public function test_with_multiple_locales_with_countries()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-US, de-DE'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('es-US', App::getLocale());
    }

    public function test_with_multiple_locales_with_countries_and_quality_value()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-AZ;q=0.7, de-DE;q=0.8'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('de-DE', App::getLocale());
    }

    public function test_with_mixed_locale_values()
    {
        $middleware = $this->app->make(HttpLocaleMiddleware::class);
        $request = Request::create('whatever', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'fr-CH, de;q=0.7, fr;q=0.9, en;q=0.8, *;q=0.5'
        ]);
        $this->assertEquals('en', App::getLocale());

        $middleware->handle($request, function () {});

        $this->assertEquals('fr-CH', App::getLocale());
    }
}

<?php

namespace Orkhanahmadov\LaravelAcceptLanguageMiddleware\Tests;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\App;
use Orkhanahmadov\LaravelAcceptLanguageMiddleware\Middleware;

class MiddlewareTest extends TestCase
{
    /**
     * @var Response
     */
    private $response;
    /**
     * @var Middleware
     */
    private $middleware;

    public function test_with_single_locale()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('es', App::getLocale());
    }

    public function test_with_single_with_country()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-US',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('es-US', App::getLocale());
    }

    public function test_with_single_with_country_and_quality_value()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-US;q=0.5',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('es-US', App::getLocale());
    }

    public function test_with_multiple_locales()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es, de',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('es', App::getLocale());
    }

    public function test_with_multiple_locales_with_countries()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-US, de-DE',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('es-US', App::getLocale());
    }

    public function test_with_multiple_locales_with_countries_and_quality_value()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'es-AZ;q=0.7, de-DE;q=0.8',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('de-DE', App::getLocale());
    }

    public function test_with_mixed_locale_values()
    {
        $request = Request::create('/', 'GET', [], [], [], [
            'HTTP_ACCEPT_LANGUAGE' => 'fr-CH, de;q=0.7, fr;q=0.9, en;q=0.8, *;q=0.5',
        ]);
        $this->assertEquals('en', App::getLocale());

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('fr-CH', App::getLocale());
    }

    public function test_does_not_set_app_locale_when_request_header_is_not_available()
    {
        $request = new Request();
        App::setLocale('es');

        $this->middleware->handle($request, function () {
            return $this->response;
        });

        $this->assertEquals('es', App::getLocale());
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->response = new Response();
        $this->middleware = new Middleware();
    }
}

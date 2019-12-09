<?php

namespace Orkhanahmadov\LaravelHttpLocaleMiddleware\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Orkhanahmadov\LaravelHttpLocaleMiddleware\LaravelHttpLocaleMiddlewareServiceProvider;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            LaravelHttpLocaleMiddlewareServiceProvider::class,
        ];
    }
}

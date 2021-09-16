<?php

namespace Vespera\DataBinder\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Vespera\DataBinder\Support\ServiceProvider;
use Vespera\LaravelMacros\Support\ServiceProvider as LaravelMacrosServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [
            ServiceProvider::class,
            LaravelMacrosServiceProvider::class,
        ];
    }
}

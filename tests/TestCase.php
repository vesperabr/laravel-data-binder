<?php

namespace Vespera\DataBinder\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Vespera\DataBinder\Support\ServiceProvider;

abstract class TestCase extends BaseTestCase
{
    protected function getPackageProviders($app)
    {
        return [ServiceProvider::class];
    }
}

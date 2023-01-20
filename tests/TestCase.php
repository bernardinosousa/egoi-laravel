<?php

namespace Bernardinosousa\EgoiLaravel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Bernardinosousa\EgoiLaravel\EgoiLaravelServiceProvider;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            EgoiLaravelServiceProvider::class,
        ];
    }
}

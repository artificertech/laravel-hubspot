<?php

namespace Artificertech\HubSpot\Tests;

use Artificertech\HubSpot\HubSpotServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            HubSpotServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('hubspot.connections.hubspot.token', 'default-testing-token');

        config()->set('hubspot.connections.test-connection', [
            'token' => 'test-connection-testing-token',
        ]);
    }
}

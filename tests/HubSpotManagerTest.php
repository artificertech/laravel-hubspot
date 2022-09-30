<?php

use Artificertech\HubSpot\HubSpotManager;

it('can create connections', function () {
    expect((new HubSpotManager($this->app))->connection())
        ->toBeInstanceOf(\HubSpot\Discovery\Discovery::class);

    expect((new HubSpotManager($this->app))->connection('test-connection'))
        ->toBeInstanceOf(\HubSpot\Discovery\Discovery::class);

    expect((new HubSpotManager($this->app))->createWithAccessToken('custom-api-token'))
        ->toBeInstanceOf(\HubSpot\Discovery\Discovery::class);
});

it('can forward calls to the default connection', function () {
    expect((new HubSpotManager($this->app))->crm())
        ->toBeInstanceOf(\HubSpot\Discovery\Crm\Discovery::class);
});

it('can check if there is an active connection', function () {
    $this->app['config']->set('hubspot.connections.connection-without-token', ['token' => null]);

    expect((new HubSpotManager($this->app))->connected('non-existant-connection'))->toBeFalse();

    expect((new HubSpotManager($this->app))->connected('connection-without-token'))->toBeFalse();

    expect((new HubSpotManager($this->app))->connected())->toBeTrue();

    expect((new HubSpotManager($this->app))->connected('hubspot'))->toBeTrue();
});

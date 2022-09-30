<?php

use Artificertech\HubSpot\Facades\HubSpot;

it('can create connections', function () {
    expect(HubSpot::connection())
        ->toBeInstanceOf(\HubSpot\Discovery\Discovery::class);

    expect(HubSpot::connection('test-connection'))
        ->toBeInstanceOf(\HubSpot\Discovery\Discovery::class);

    expect(HubSpot::createWithAccessToken('custom-api-token'))
        ->toBeInstanceOf(\HubSpot\Discovery\Discovery::class);
});

it('can forward calls to the default connection', function () {
    expect(HubSpot::crm())
        ->toBeInstanceOf(\HubSpot\Discovery\Crm\Discovery::class);
});

it('can check if there is an active connection', function () {
    $this->app['config']->set('hubspot.connections.connection-without-token', ['token' => null]);

    expect(HubSpot::connected('non-existant-connection'))->toBeFalse();

    expect(HubSpot::connected('connection-without-token'))->toBeFalse();

    expect(HubSpot::connected())->toBeTrue();

    expect(HubSpot::connected('hubspot'))->toBeTrue();
});

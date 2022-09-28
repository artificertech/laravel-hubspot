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

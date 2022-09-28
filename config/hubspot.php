<?php

// config for Artificertech/HubSpot
return [

    /*
    |--------------------------------------------------------------------------
    | Default Hubspot Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the hubspot connections below you wish
    | to use as your default connection for all HubSpot work. Of course
    | you may use many connections at once using the HubSpot library.
    |
    */

    'default' => env('HUBSPOT_CONNECTION', 'hubspot'),

    /*
    |--------------------------------------------------------------------------
    | HubSpot Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the HubSpot connections setup for your application.
    |
    */

    'connections' => [
        'hubspot' => [
            'token' => env('HUBSPOT_ACCESS_TOKEN'),
        ],
    ],

];

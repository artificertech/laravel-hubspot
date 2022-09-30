<?php

namespace Artificertech\HubSpot\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \HubSpot\Discovery\Discovery                          connection(string $name = null)
 * @method static bool                                                  connected(string $connection = null)
 *
 * @method static \HubSpot\Discovery\Discovery                          create(\GuzzleHttp\ClientInterface $client = null, \HubSpot\Config $config = null)
 * @method static \HubSpot\Discovery\Discovery                          createWithApiKey(string $apiKey, \GuzzleHttp\ClientInterface $client = null)
 * @method static \HubSpot\Discovery\Discovery                          createWithAccessToken(string $accessToken, \GuzzleHttp\ClientInterface $client = null)
 *
 * @method static \HubSpot\Discovery\Auth\Discovery                     auth()
 * @method static \HubSpot\Discovery\Automation\Discovery               automation()
 * @method static \HubSpot\Discovery\Cms\Discovery                      cms()
 * @method static \HubSpot\Discovery\Conversations\Discovery            conversations()
 * @method static \HubSpot\Discovery\CommunicationPreferences\Discovery communicationPreferences()
 * @method static \HubSpot\Discovery\Crm\Discovery                      crm()
 * @method static \HubSpot\Discovery\Events\Discovery                   events()
 * @method static \HubSpot\Discovery\Files\Discovery                    files()
 * @method static \HubSpot\Discovery\Marketing\Discovery                marketing()
 * @method static \HubSpot\Discovery\Settings\Discovery                 settings()
 * @method static \HubSpot\Discovery\Webhooks\Discovery                 webhooks()
 *
 * @see \HubSpot\Factory
 * @see \HubSpot\Discovery\Discovery
 * @see \Artificertech\HubSpot\HubSpotManager
 */
class HubSpot extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Artificertech\HubSpot\HubSpotManager::class;
    }
}

<?php

namespace Artificertech\HubSpot;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Arr;
use InvalidArgumentException;

/**
 * @method \HubSpot\Discovery\Discovery create(\GuzzleHttp\ClientInterface $client = null, \HubSpot\Config $config = null)
 * @method \HubSpot\Discovery\Discovery createWithApiKey(string $apiKey, \GuzzleHttp\ClientInterface $client = null)
 * @method \HubSpot\Discovery\Discovery createWithAccessToken(string $accessToken, \GuzzleHttp\ClientInterface $client = null)
 *
 * @mixin \HubSpot\Discovery\Discovery
 *
 * @see \HubSpot\Factory
 */
class HubSpotManager
{
    /**
     * The active connection instances.
     *
     * @var array<string, \HubSpot\Discovery\Discovery>
     */
    protected $connections = [];

    /**
     * Create a new hubspot manager instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(protected Application $app)
    {
    }

    /**
     * Get a hubspot discovery instance
     *
     * @param  string|null  $name
     * @return \HubSpot\Discovery\Discovery
     */
    public function connection(string $name = null): \HubSpot\Discovery\Discovery
    {
        $name = $this->parseConnectionName($name);

        // If we haven't created this connection, we'll create it based on the config
        // provided in the application
        if (! isset($this->connections[$name])) {
            $this->connections[$name] = $this->makeConnection($name);
        }

        return $this->connections[$name];
    }

    protected function parseConnectionName(string $name = null): string
    {
        return $name ?: $this->app['config']['hubspot.default'];
    }

    protected function makeConnection(string $name): \HubSpot\Discovery\Discovery
    {
        $config = $this->configuration($name);

        if (is_null($token = Arr::get($config, 'token'))) {
            throw new InvalidArgumentException("Database connection [{$name}] does not have a valid token.");
        }

        return \HubSpot\Factory::createWithAccessToken($token);
    }

    protected function configuration(string $name): array
    {
        $connections = $this->app['config']['hubspot.connections'];

        if (is_null($config = Arr::get($connections, $name))) {
            throw new InvalidArgumentException("Database connection [{$name}] not configured.");
        }

        return $config;
    }

    /**
     * Dynamically pass methods to the default connection.
     *
     * @param  string  $method
     * @param  array  $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (method_exists(\HubSpot\Factory::class, $method)) {
            return \HubSpot\Factory::$method(...$parameters);
        }

        return $this->connection()->$method(...$parameters);
    }
}

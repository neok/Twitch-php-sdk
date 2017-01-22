<?php
declare(strict_types=1);

namespace TwitchHelper;

use GuzzleHttp\Client;
use TwitchHelper\Authentication\OAuth2Client;
use TwitchHelper\Exceptions\TwitchHelperException;
use TwitchHelper\HttpClient\GuzzleHttpClient;

/**
 * Class Twitch
 */
class Twitch
{
    /**
     * @var TwitchApp
     */
    public $twitchApp;
    /**
     * @var TwitchClient
     */
    public $client;
    /**
     * @var OAuth2Client
     */
    public $oAuth2Client;

    protected $request;

    public function __construct(array $config)
    {
        if (!isset($config['secret'])) {
            throw new TwitchHelperException('Secret is missing.');
        }

        if (!isset($config['app_id'])) {
            throw new TwitchHelperException('Application id is missing.');
        }

        if (!isset($config['unique_token'])) {
            throw new TwitchHelperException('Unique token is missing');
        }
        $this->twitchApp = new TwitchApp($config['app_id'], $config['secret'], $config['unique_token']);
        //@todo create factory later for client creation
        $this->client = new TwitchClient(new GuzzleHttpClient(new Client()));
        $this->oAuth2Client = new OAuth2Client($this->twitchApp, $this->client);
    }

    public function sendRequest(string $method, string $endpoint, array $params = []) : array
    {
        $request = new TwitchRequest($method, $endpoint, $params);

        return $this->client->sendRequest($request);
    }
}

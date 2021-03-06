<?php
declare(strict_types=1);

namespace Neok\Twitch;

use GuzzleHttp\Client;
use Neok\Twitch\Authentication\OAuth2Client;
use Neok\Twitch\Exceptions\TwitchHelperException;
use Neok\Twitch\HttpClient\GuzzleHttpClient;

/**
 * Class Twitch
 */
class Twitch
{
    /**
     * @var TwitchApp
     */
    private $twitchApp;
    /**
     * @var TwitchClient
     */
    private $client;
    /**
     * @var OAuth2Client
     */
    private $oAuth2Client;

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

        if (!isset($config['redirect_uri'])) {
            throw new TwitchHelperException('Redirect uri is missing');
        }
        $this->twitchApp = new TwitchApp($config['app_id'], $config['secret'], $config['unique_token'], $config['redirect_uri']);
        //@todo create factory later for client creation
        $this->client = new TwitchClient(new GuzzleHttpClient(new Client()));
        $this->oAuth2Client = new OAuth2Client($this->twitchApp, $this->client);
    }

    /**
     * Gets TwitchApp.
     *
     * @return TwitchApp
     */
    public function getTwitchApp(): TwitchApp
    {
        return $this->twitchApp;
    }

    /**
     * Gets Client.
     *
     * @return TwitchClient
     */
    public function getClient(): TwitchClient
    {
        return $this->client;
    }

    /**
     * Gets OAuth2Client.
     *
     * @return OAuth2Client
     */
    public function getOAuth2Client(): OAuth2Client
    {
        return $this->oAuth2Client;
    }
}

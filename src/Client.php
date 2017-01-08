<?php

namespace TwitchHelper;

class Client
{
    const BASE_URL = 'https://api.twitch.tv/kraken';

    const ENDPOINT_GAMES = '/games/top';

    /**
     * Client Id.
     *
     * @var string
     */
    protected $clientId;

    protected $httpClient;

    public function __construct($clientId)
    {
        $this->clientId = $clientId;
    }

    public function sendRequest(TwitchRequest $twitchRequest)
    {
        return [];
    }
}

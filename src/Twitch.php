<?php

namespace TwitchHelper;

class Twitch
{
    protected $client;

    protected $oAuth2Client;

    protected $request;

    public function __construct($clientId)
    {
        $this->client = new Client($clientId);
    }

    public function sendRequest($method, $endpoint, array $params = [])
    {
        $request = new TwitchRequest($method, $endpoint, $params);

        return $this->client->sendRequest($request);
    }
}

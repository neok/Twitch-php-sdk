<?php

namespace TwitchHelper\HttpClient;

/**
 * Class GuzzleHttpClient
 */
class GuzzleHttpClient implements HttpClientInterface
{
    /**
     * @var \GuzzleHttp\Client
     */
    protected $guzzleClient;

    /**
     * GuzzleHttpClient constructor.
     *
     * @param \GuzzleHttp\Client $client
     */
    public function __construct(\GuzzleHttp\Client $client)
    {
        $this->guzzleClient = $client;
    }

    public function send($url, $method, $body)
    {
        // TODO: Implement send() method.
    }
}

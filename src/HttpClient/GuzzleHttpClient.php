<?php

namespace TwitchHelper\HttpClient;

use GuzzleHttp\Psr7\Request;
use TwitchHelper\Http\TwitchRawResponse;

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

    /**
     * @param string $url
     * @param string $method
     * @param null   $body
     *
     * @return TwitchRawResponse
     */
    public function send($url, $method, $body = null)
    {
        $request = new Request($method, $url);
        $result = $this->guzzleClient->send($request);

        $rawResponse = new TwitchRawResponse();
        $rawResponse->setBody($result->getBody());
        $rawResponse->setStatus($result->getStatusCode());

        return $rawResponse;
    }
}

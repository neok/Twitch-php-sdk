<?php

namespace TwitchHelper\HttpClient;

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
     * @param array  $headers
     *
     * @return TwitchRawResponse
     */
    public function send($url, $method, $body = null, array $headers = [])
    {

        $request = $this->guzzleClient->createRequest($method, $url);
        $request->setHeaders($headers);

        $result      = $this->guzzleClient->send($request);
        $rawResponse = new TwitchRawResponse();
        $rawResponse->setBody($result->getBody());
        $rawResponse->setStatus($result->getStatusCode());


        return $rawResponse;
    }
}

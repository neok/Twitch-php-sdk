<?php

namespace TwitchHelper\HttpClient;

use TwitchHelper\Http\TwitchRawResponse;

/**
 * Interface HttpClientInterface
 */
interface HttpClientInterface
{
    /**
     * @param string $url
     * @param string $method
     * @param null   $body
     *
     * @return TwitchRawResponse
     */
    public function send($url, $method, $body = null, array $headers = []);
}

<?php

namespace TwitchHelper\HttpClient;

interface HttpClientInterface
{
    public function send($url, $method, $body);
}

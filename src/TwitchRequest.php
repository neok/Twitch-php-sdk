<?php

namespace Neok\Twitch;

use Neok\Twitch\Authentication\AccessToken;

class TwitchRequest
{
    /**
     * @var string
     */
    private $method;
    /**
     * @var string
     */
    private $endpoint;

    /**
     * @var string
     */
    private $accessToken;
    /**
     * @var array
     */
    private $headers = [];

    /**
     * TwitchRequest constructor.
     *
     * @param string $method
     * @param string $endpoint
     */
    public function __construct(string $method, string $endpoint, AccessToken $accessToken = null)
    {
        $this->setMethod($method);
        $this->setEndpoint($endpoint);
        if ($accessToken) {
            $this->setAccessToken($accessToken->getAccessToken());
        }
    }

    /**
     * Gets Method
     *
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * Sets Method
     *
     * @param string $method
     *
     * @return $this
     */
    public function setMethod(string $method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * Gets Endpoint
     *
     * @return string
     */
    public function getEndpoint()
    {
        return $this->endpoint;
    }

    /**
     * Sets Endpoint
     *
     * @param string $endpoint
     *
     * @return $this
     */
    public function setEndpoint(string $endpoint)
    {
        $this->endpoint = $endpoint;

        return $this;
    }

    /**
     * Gets AccessToken
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }

    /**
     * Sets AccessToken
     *
     * @param string $accessToken
     *
     * @return $this
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
        if ($accessToken instanceof AccessToken) {
            $this->accessToken = $accessToken->getAccessToken();
        }

        return $this;
    }

    /**
     * Gets Headers
     *
     * @return array
     */
    public function getHeaders()
    {
        return $this->headers;
    }

    /**
     * Sets Headers
     *
     * @param array $headers
     *
     * @return $this
     */
    public function setHeaders(array $headers)
    {
        $this->headers = $headers;

        return $this;
    }
}

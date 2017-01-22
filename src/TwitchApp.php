<?php
declare(strict_types=1);

namespace TwitchHelper;

class TwitchApp
{
    private $clientId;

    private $secret;

    private $uniqueToken;


    public function __construct(string $id, string $secret, string $uniqueToken)
    {
        $this->clientId    = $id;
        $this->secret      = $secret;
        $this->uniqueToken = $uniqueToken;
    }

    /**
     * Gets ClientId
     *
     * @return string
     */
    public function getClientId()
    {
        return $this->clientId;
    }

    /**
     * Gets Secret
     *
     * @return string
     */
    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * Gets UniqueToken
     *
     * @return string
     */
    public function getUniqueToken()
    {
        return $this->uniqueToken;
    }
}

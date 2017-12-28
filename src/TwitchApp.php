<?php
declare(strict_types = 1);

namespace Neok\Twitch;

/**
 * Class TwitchApp
 */
class TwitchApp
{
    /**
     * @var string
     */
    private $clientId;

    /**
     * @var string
     */
    private $secret;

    /**
     * @var string
     */
    private $uniqueToken;

    /**
     * @var string
     */
    private $redirectUri;


    public function __construct(
        string $id,
        string $secret,
        string $uniqueToken,
        string $redirectUri
    ) {
        $this->clientId    = $id;
        $this->secret      = $secret;
        $this->uniqueToken = $uniqueToken;
        $this->redirectUri = $redirectUri;
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

    /**
     * Gets RedirectUri
     *
     * @return string
     */
    public function getRedirectUri()
    {
        return $this->redirectUri;
    }
}

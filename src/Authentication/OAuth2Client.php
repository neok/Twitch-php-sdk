<?php
declare(strict_types=1);

namespace Neok\Twitch\Authentication;

use Neok\Twitch\TwitchApp;
use Neok\Twitch\TwitchClient;
use Neok\Twitch\TwitchRequest;

/**
 * Class OAuth2Client
 */
class OAuth2Client
{
    /**
     * @var TwitchApp
     */
    private $app;
    /**
     * @var TwitchClient
     */
    private $client;

    /**
     * OAuth2Client constructor.
     *
     * @param TwitchApp    $app
     * @param TwitchClient $client
     */
    public function __construct(TwitchApp $app, TwitchClient $client)
    {
        $this->app    = $app;
        $this->client = $client;
    }

    /**
     * @param string $redirectUri
     * @param array  $scopes
     *
     * @return string
     */
    public function getAuthenticationUrl(string $redirectUri, array $scopes) : string
    {
        return sprintf(
            TwitchClient::BASE_URL . '/oauth2/authorize?response_type=code&client_id=%s&redirect_uri=%s&scope=&%&state=%s',
            $this->app->getClientId(),
            $redirectUri,
            implode(',', $scopes),
            $this->app->getUniqueToken()
        );
    }

    /**
     * @param string $authorizationCode
     *
     * @return \Neok\Twitch\TwitchResponse
     */
    public function getAccessToken(string $authorizationCode)
    {
        $url = sprintf(
            TwitchClient::BASE_URL . '/oauth2/token?client_id=%s&client_secret=%s&grant_type=authorization_code&redirect_uri=%s&code=%s&state=%s',
            $this->app->getClientId(),
            $this->app->getSecret(),
            $this->app->getRedirectUri(),
            $authorizationCode,
            $this->app->getUniqueToken()
        );

        $request = new TwitchRequest('POST', $url);
        $request->setHeaders(['Client-ID' => $this->app->getClientId()]);

        return $this->client->sendRequest($request);
    }

}

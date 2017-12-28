<?php
declare(strict_types=1);

namespace Neok\Twitch;

use Neok\Twitch\HttpClient\HttpClientInterface;

/**
 * Class TwitchClient
 */
class TwitchClient
{
    public const  BASE_URL       = 'https://api.twitch.tv/kraken';
    public const  HELIX_URL      = 'https://api.twitch.tv/helix';
    private const ENDPOINT_GAMES = '/games/top';

    /**
     * @var HttpClientInterface
     */
    protected $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * @param TwitchRequest $twitchRequest
     *
     * @return TwitchResponse
     */
    public function sendRequest(TwitchRequest $twitchRequest)
    {
        $response = $this->httpClient->send(
            $twitchRequest->getEndpoint(),
            $twitchRequest->getMethod(),
            null,
            $twitchRequest->getHeaders()
        );

        $twitchResponse = new TwitchResponse();
        $twitchResponse
            ->setBody($response->getBody())
            ->setHttpStatusCode($response->getStatus());

        return $twitchResponse;
    }
}

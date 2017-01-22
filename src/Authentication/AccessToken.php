<?php
declare(strict_types=1);

namespace TwitchHelper\Authentication;

/**
 * Class AccessToken
 */
class AccessToken
{
    /**
     * @var string
     */
    private $accessToken;

    /**
     * @var string
     */
    private $scope;

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

        return $this;
    }

    /**
     * Gets Scope
     *
     * @return string
     */
    public function getScope()
    {
        return $this->scope;
    }

    /**
     * Sets Scope
     *
     * @param string $scope
     *
     * @return $this
     */
    public function setScope($scope)
    {
        $this->scope = $scope;

        return $this;
    }
}

<?php

namespace Neok\Twitch\Http;

/**
 * Class TwitchRawResponse
 */
class TwitchRawResponse
{
    /**
     * @var
     */
    private $body;

    /**
     * @var
     */
    private $status;

    /**
     * Gets Body
     *
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * Sets Body
     *
     * @param mixed $body
     *
     * @return $this
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Gets Status
     *
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Sets Status
     *
     * @param mixed $status
     *
     * @return $this
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

}

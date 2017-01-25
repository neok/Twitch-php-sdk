<?php

namespace TwitchHelper;

/**
 * Class TwitchResponse
 */
class TwitchResponse
{
    /**
     * @var mixed
     */
    protected $body;

    /**
     * @var int
     */
    protected $httpStatusCode;

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
     * Gets HttpStatusCode
     *
     * @return int
     */
    public function getHttpStatusCode()
    {
        return $this->httpStatusCode;
    }

    /**
     * Sets HttpStatusCode
     *
     * @param int $httpStatusCode
     *
     * @return $this
     */
    public function setHttpStatusCode($httpStatusCode)
    {
        $this->httpStatusCode = $httpStatusCode;

        return $this;
    }


}

<?php

namespace TwitchHelper;

class Client
{
    private $secret;

    public function __construct($secret)
    {
        $this->secret = $secret;
    }
}

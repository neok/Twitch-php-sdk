<?php

namespace TwitchHelper\Tests;

use TwitchHelper\TwitchApp;

/**
 * Class TwitchAppTest
 */
class TwitchAppTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var TwitchApp
     */
    protected $app;

    public function setUp()
    {
        $this->app = new TwitchApp('id', 'secret', 'unique', 'http://github.com');
    }

    public function testGetClientId()
    {
        static::assertEquals('id', $this->app->getClientId());
    }

    public function testGetSecret()
    {
        static::assertEquals('secret', $this->app->getSecret());
    }

    public function testGetUniqueToken()
    {
        static::assertEquals('unique', $this->app->getUniqueToken());
    }

    public function testGetRedirectUri()
    {
        static::assertEquals('http://github.com', $this->app->getRedirectUri());
    }
}

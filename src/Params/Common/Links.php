<?php

namespace TwitchHelper\Params\Common;

use TwitchHelper\Params\AbstractParams;

/**
 * Class Links
 *
 * @method setSelf(string $self)
 * @method string getSelf()
 *
 * @method setNext(string $next)
 * @method string getNext()
 */
class Links extends AbstractParams
{
    /**
     * @var string
     */
    protected $self;
    /**
     * @var string
     */
    protected $next;
}

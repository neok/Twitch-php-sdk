<?php

namespace TwitchHelper\Params\Games;

use TwitchHelper\Params\AbstractParams;

/**
 * Class MediaItem
 *
 * @method setLarge(string $large)
 * @method string getLarge()
 *
 * @method setMedium(string $medium)
 * @method string getMedium()
 *
 * @method setSmall(string $small)
 * @method string getSmall()
 *
 * @method setTemplate(string $template)
 * @method string getTemplate()
 */
class MediaItem extends AbstractParams
{
    /**
     * @var string
     */
    protected $large;

    /**
     * @var string
     */
    protected $medium;

    /**
     * @var string
     */
    protected $small;

    /**
     * @var string
     */
    protected $template;
}

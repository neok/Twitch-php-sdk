<?php

namespace TwitchHelper\Params\Games;

use TwitchHelper\Params\AbstractParams;
use TwitchHelper\Params\Common\Links;

/**
 * Class Game
 *
 * @method setId(int $id)
 * @method int getId()
 *
 * @method setBox(MediaItem $box)
 * @method MediaItem getBox()
 *
 * @method setGiantbombId(int $giantbombId)
 * @method int getGiantbombId()
 *
 * @method setLogo(MediaItem $box)
 * @method MediaItem getLogo()
 *
 * @method setName(string $name)
 * @method string getName()
 *
 * @method setLinks(Links $links)
 * @method Links getLinks()
 */
class Game extends AbstractParams
{
    /**
     * @var
     */
    protected $id;

    /**
     * @var MediaItem
     */
    protected $box;

    /**
     * @var int
     */
    protected $giantbombId;

    /**
     * @var MediaItem
     */
    protected $logo;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var int
     */
    protected $popularity;

    /**
     * @var Links
     */
    protected $links;
}

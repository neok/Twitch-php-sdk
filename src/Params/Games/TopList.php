<?php

namespace TwitchHelper\Params\Games;

use TwitchHelper\Params\AbstractParams;
use TwitchHelper\Params\Common\Links;


/**
 * Class TopList
 *
 * @method setTotal(int $id)
 * @method int getTotal()
 *
 * @method setTop(Item[] $name)
 * @method Item[] getTop()
 *
 * @method setLinks(Links $links)
 * @method Links getLinks()
 */
class TopList extends AbstractParams
{
    /**
     * @var int
     */
    protected $total;
    /**
     * @var Item[]
     */
    protected $top;

    /**
     * @var Links
     */
    protected $links;
}

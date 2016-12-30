<?php

namespace TwitchHelper\Params\Games;

use TwitchHelper\Params\AbstractParams;

/**
 * Class Item
 *
 * @method setChannels(int $channels)
 * @method int getChannels()
 *
 * @method setViewers(int $viewers)
 * @method int getViewers()
 *
 * @method setGame(Game $game)
 * @method Game getGame()
 */
class Item extends AbstractParams
{
    /**
     * @var int
     */
    protected $channels;

    /**
     * @var int
     */
    protected $viewers;

    /**
     * @var Game
     */
    protected $game;
}

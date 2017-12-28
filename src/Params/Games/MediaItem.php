<?php

namespace Neok\Twitch\Params\Games;

use Neok\Twitch\Params\AbstractParams;

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

    /**
     * Get template by dimension.
     *
     * @param float $width
     * @param float $height
     *
     * @return string
     */
    public function getTemplateByDimension($width, $height)
    {
        return str_replace(
            ['{width}', '{height}'],
            [(float) $width, (float) $height],
            $this->getTemplate()
        );
    }
}

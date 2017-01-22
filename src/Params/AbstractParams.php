<?php
declare(strict_types=1);

namespace TwitchHelper\Params;

use Guzzle\Inflection\Inflector;
use TwitchHelper\Params\Games\Game;
use TwitchHelper\Params\Games\Item;
use TwitchHelper\Params\Games\MediaItem;

/**
 * Class AbstractParams
 *
 * Default setters and getters for endpoints.
 *
 * @author Petr Popelyshko <petrneok@gmail.com>
 */
abstract class AbstractParams
{
    /**
     * @var \ReflectionClass
     */
    private $reflection;
    /**
     * @var array
     */
    private static $filterableTypes = ['bool', 'int', 'float', 'string'];
    /** @var array */
    private static $classArray = [
        'Item[]' => Item::class,

    ];
    /** @var array */
    private static $class = [
        'MediaItem' => MediaItem::class,
        'Game'      => Game::class,
    ];

    /**
     * @param array $params
     */
    public function __construct(array $params = [])
    {
        $this->reflection = new \ReflectionClass($this);
        if (!empty($params)) {
            foreach ($params as $param => $value) {
                $param  = 'set' . ucfirst(($param[0] === '_' ? substr($param, 1) : $param));
                $setter = lcfirst(Inflector::getDefault()->camel($param));
                $this->$setter($value);
            }
        }
    }

    /**
     * @param $name
     * @param $arguments
     *
     * @return bool|mixed|null
     */
    public function __call($name, $arguments)
    {
        $prefix = substr($name, 0, 3);
        $name   = lcfirst(substr($name, 3));
        if (!property_exists($this, $name)) {
            return false;
        } else {
            switch ($prefix) {
                case 'set':
                    if (!array_key_exists(0, $arguments)) {
                        return false;
                    }
                    $this->defaultSetter($name, $arguments[0]);
                    break;
                case 'get':
                    return $this->defaultGetter($name);
                    break;
                default:
                    break;
            }
        }

        return null;
    }

    /**
     * @param mixed $param
     * @param mixed $value
     *
     * @return $this
     */
    protected function defaultSetter(string $param, $value)
    {
        $property = $this->reflection->getProperty($param);
        $comment  = $property->getDocComment();
        preg_match("/@var (.*)$/m", $comment, $type);

        if (count($type) === 2 && !empty($type[1])) {
            $type = trim($type[1]);
        }

        if (in_array($type, self::$filterableTypes)) {
            settype($value, $type);
            $this->$param = $value;
        } elseif (!is_array($type) && array_key_exists($type, self::$classArray)) {
            $className = self::$classArray[$type];
            $this->$param = array_map(
                function ($val) use ($className) {
                    return new $className($val);
                }, $value
            );
        } elseif (!is_array($type) && array_key_exists($type, self::$class)) {
            $className    = self::$class[$type];
            $this->$param = new $className($value);
        } else {
            $this->$param = $value;
        }


        return $this;
    }

    /**
     * @param string $param
     *
     * @return mixed
     */
    protected function defaultGetter(string $param)
    {
        return $this->$param;
    }
}

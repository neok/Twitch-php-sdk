<?php
namespace TwitchHelper\Params;

use Guzzle\Inflection\Inflector;
use TwitchHelper\Params\Games\Game;
use TwitchHelper\Params\Games\Item;
use TwitchHelper\Params\Games\MediaItem;

/**
 * Class AbstractParams
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
    private static $filterable = ['bool', 'boolean', 'int', 'integer', 'float', 'string'];

    private static $classArray = [
        'Item[]' => Item::class,

    ];

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
        if (in_array($name, ['reflection', 'filterable', 'paramErrors'])) {
            return false;
        }
        if (!property_exists($this, $name)) {
            return false;
        } else {
            switch ($prefix) {
                case "get":
                    return $this->defaultGetter($name);
                    break;
                case "set":
                    if (!isset($arguments[0])) {
                        return false;
                    }
                    $this->defaultSetter($name, $arguments[0]);
                    break;
                default:
            }
        }

        return null;
    }

    /**
     * @param $param
     * @param $value
     *
     * @return $this
     */
    protected function defaultSetter($param, $value)
    {
        $propery   = $this->reflection->getProperty($param);
        $comment = $propery->getDocComment();
        preg_match("/@var (.*)$/m", $comment, $type);

        if (2 == count($type) && !empty($type[1])) {
            $type = trim($type[1]);
        }

        if (in_array($type, self::$filterable)) {
            settype($value, $type);
            $this->$param = $value;
        } elseif (!is_array($type) && array_key_exists($type, self::$classArray)) {
            $item      = [];
            $className = self::$classArray[$type];
            //@array_map?
            foreach ($value as $pm => $val) {
                $item[] = new $className($val);
            }
            $this->$param = $item;
        } elseif (!is_array($type) && array_key_exists($type, self::$class)) {
            $className    = self::$class[$type];
            $this->$param = new $className($value);
        } else {
            $this->$param = $value;
        }


        return $this;
    }

    /**
     * @param $param
     *
     * @return mixed
     */
    protected function defaultGetter($param)
    {
        return $this->$param;
    }
}

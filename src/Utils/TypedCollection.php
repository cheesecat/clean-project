<?php

namespace Napoleon\Utils;

/**
 * Class TypedCollection
 * @package App\Utils
 */
abstract class TypedCollection implements \ArrayAccess, \IteratorAggregate
{
    protected $type;

    private $container = [];

    /**
     * Set $type
     * TypedCollection constructor.
     */
    public abstract function __construct();

    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->container[$offset];
    }

    public function offsetSet($offset, $value)
    {
        if (!is_a($value, $this->type)) {
            throw new \UnexpectedValueException();
        }
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    public function getIterator()
    {
        return new \ArrayIterator($this->container);
    }
}
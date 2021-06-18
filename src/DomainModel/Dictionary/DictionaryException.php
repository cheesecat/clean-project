<?php

namespace Napoleon\DomainModel\Dictionary;

/**
 * Class DictionaryException
 * @package App\DomainModel\Dictionary
 */
class DictionaryException extends \Exception
{
    private const NOT_FOUND = 404;
    /**
     * @param string $name
     * @return DictionaryException
     */
    public static function notFoundName(string $name): self
    {
        return new self(sprintf("Can't find dictionary by name: %s", $name), self::NOT_FOUND);
    }
}
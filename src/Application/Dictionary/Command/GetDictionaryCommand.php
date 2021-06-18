<?php

namespace Napoleon\Application\Dictionary\Command;

/**
 * Class GetDictionaryCommand
 * @package App\Application\Dictionary\Command
 */
class GetDictionaryCommand
{
    /**
     * @var string
     */
    public $name;

    /**
     * GetDictionaryCommand constructor.
     * @param $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


}
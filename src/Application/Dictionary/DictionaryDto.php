<?php

namespace Napoleon\Application\Dictionary;

/**
 * Class DictionaryDto
 * @package App\Application\Dictionary
 */
class DictionaryDto
{
    /**
     * @var string
     */
    public $name;
    /**
     * @var array
     */
    public $dictionaryItems;

    /**
     * DictionaryDto constructor.
     * @param string $name
     * @param array $dictionaryItems
     */
    public function __construct(string $name, ?array $dictionaryItems)
    {
        $this->name = $name;
        $this->dictionaryItems = $dictionaryItems ?: [];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return DictionaryDto
     */
    public function setName(string $name): self
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getDictionaryItems(): array
    {
        return $this->dictionaryItems;
    }

    /**
     * @param array $dictionaryItems
     * @return DictionaryDto
     */
    public function setDictionaryItems(array $dictionaryItems): self
    {
        $this->dictionaryItems = $dictionaryItems;
    }

    /**
     * @param string $item
     * @return DictionaryDto
     */
    public function addDictionaryItems(string $item): self
    {
        $this->dictionaryItems[] = $item;
    }

}
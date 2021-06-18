<?php

namespace Napoleon\Application\Dictionary;

use Napoleon\Application\Dictionary\Command\GetDictionaryCommand;
use Napoleon\DomainModel\Dictionary\DictionaryException;
use Napoleon\DomainModel\Dictionary\DictionaryItem;
use Napoleon\DomainModel\Dictionary\DictionaryService;

/**
 * Class DictionaryAppService
 * @package App\Application\Dictionary
 */
class DictionaryAppService
{
    /**
     * @var DictionaryService
     */
    private $dictionaryService;

    /**
     * DictionaryAppService constructor.
     * @param DictionaryService $dictionaryService
     */
    public function __construct(DictionaryService $dictionaryService)
    {
        $this->dictionaryService = $dictionaryService;
    }

    /**
     * @param \Napoleon\Application\Dictionary\Command\GetDictionaryCommand $command
     * @return \Napoleon\Application\Dictionary\DictionaryDto
     * @throws DictionaryException
     */
    public function getDictionary(GetDictionaryCommand $command): DictionaryDto
    {
        $dictionary = $this->dictionaryService->getDictionary($command->getName());
        $items = [];
        /** @var DictionaryItem $item */
        foreach ($dictionary->getDictionaryItems() as $item) {
            $items[] = $item->getValue();
        }
        return new DictionaryDto($dictionary->getName(), $items);
    }
}
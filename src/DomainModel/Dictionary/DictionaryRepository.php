<?php
declare(strict_types=1);

namespace Napoleon\DomainModel\Dictionary;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class DictionaryDbRepository
 * @package App\DomainModel\Dictionary
 */
interface DictionaryRepository
{
    public function getDictionaryById(int $id): ?Dictionary;

    public function getDictionaryItemsById(int $id): ArrayCollection;

    public function getDictionaryItemById(int $id): DictionaryItem;

    /**
     * @param string $name
     * @return Dictionary
     * @throws DictionaryException
     */
    public function getDictionaryByName(string $name): Dictionary;
}
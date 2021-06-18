<?php
declare(strict_types=1);

namespace Napoleon\DomainModel\Dictionary;

/**
 * Class DictionaryService
 * @package App\DomainModel\Dictionary
 */
class DictionaryService
{
    /**
     * @var DictionaryRepository
     */
    private $repository;

    /**
     * DictionaryService constructor.
     * @param DictionaryRepository $repository
     */
    public function __construct(DictionaryRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param string $name
     * @return Dictionary
     * @throws DictionaryException
     */
    public function getDictionary(string $name): Dictionary
    {
        return $this->repository->getDictionaryByName($name);
    }
}
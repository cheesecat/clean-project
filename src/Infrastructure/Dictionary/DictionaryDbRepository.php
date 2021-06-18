<?php
declare(strict_types=1);

namespace Napoleon\Infrastructure\Dictionary;

use Napoleon\DomainModel\Dictionary\Dictionary;
use Napoleon\DomainModel\Dictionary\DictionaryException;
use Napoleon\DomainModel\Dictionary\DictionaryItem;
use Napoleon\DomainModel\Dictionary\DictionaryItemCollection;
use Napoleon\DomainModel\Dictionary\DictionaryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;

/**
 * Class DictionaryDbRepository
 * @package App\Infrastructure\Dictionary
 */
class DictionaryDbRepository implements DictionaryRepository
{

    /**
     * @var EntityRepository
     */
    private $repository;

    /**
     * DictionaryDbRepository constructor.
     * @param EntityManagerInterface $repository
     */
    public function __construct(EntityManagerInterface $repository)
    {
        $this->repository = $repository->getRepository(Dictionary::class);
    }

    public function getDictionaryById(int $id): ?Dictionary
    {
        return $this->repository->findOneBy(['id' => $id]);
    }

    public function getDictionaryItemsById(int $id): ArrayCollection
    {
        // TODO: Implement getDictionaryItemsById() method.
    }

    public function getDictionaryItemById(int $id): DictionaryItem
    {
        // TODO: Implement getDictionaryItemById() method.
    }

    /**
     * @param string $name
     * @return Dictionary
     * @throws DictionaryException
     */
    public function getDictionaryByName(string $name): Dictionary
    {
        $result = $this->repository->findOneBy(['name' => $name]);
        if (!$result) {
            throw DictionaryException::notFoundName($name);
        }
        return $result;
    }

}
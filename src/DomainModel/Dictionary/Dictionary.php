<?php
declare(strict_types=1);

namespace Napoleon\DomainModel\Dictionary;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class Dictionary
 * @package App\DomainModel\Dictionary
 * @ORM\Entity()
 * @ORM\Table(name="dictionary")
 */
class Dictionary
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dictionary_seq", initialValue=1)
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=100)
     * @var string
     */
    private $name;
    /**
     * @ORM\OneToMany(targetEntity="DictionaryItem", mappedBy="dictionaryId", cascade={"persist"})
     * @var Collection
     */
    private $dictionaryItems;

    /**
     * Dictionary constructor.
     */
    public function __construct()
    {
        $this->dictionaryItems = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getDictionaryItems(): Collection
    {
        return $this->dictionaryItems;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param Collection $dictionaryItems
     */
    public function setDictionaryItems(Collection $dictionaryItems): void
    {
        $this->dictionaryItems = $dictionaryItems;
    }
}
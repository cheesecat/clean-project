<?php
declare(strict_types=1);

namespace Napoleon\DomainModel\Dictionary;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class DictionaryItem
 * @package App\DomainModel\DictionaryItem
 * @ORM\Entity()
 * @ORM\Table(name="dictionary_items")
 */
class DictionaryItem
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="dictionary_item_seq")
     * @ORM\Column(type="integer")
     * @var int
     */
    private $id;
    /**
     * @ORM\ManyToOne(targetEntity="Dictionary", inversedBy="dictionaryItemCollection")
     * @ORM\JoinColumn(name="dictionary_id", referencedColumnName="id")
     */
    private $dictionaryId;
    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $value;

    /**
     * DictionaryItem constructor.
     * @param $dictionaryId
     * @param $value
     */
    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDictionaryId()
    {
        return $this->dictionaryId;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @param Dictionary $dictionaryId
     * @return DictionaryItem
     */
    public function setDictionaryId(Dictionary $dictionaryId): self
    {
        $this->dictionaryId = $dictionaryId;
        return $this;
    }

}
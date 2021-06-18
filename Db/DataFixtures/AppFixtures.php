<?php

namespace DataFixtures;

use Asr\DomainModel\Dictionary\Dictionary;
use Asr\DomainModel\Dictionary\DictionaryItem;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $dic = new Dictionary();
        $dic->setName('YES_NO');
        $dic->setDictionaryItems(new ArrayCollection([
            (new DictionaryItem('tak'))->setDictionaryId($dic),
            (new DictionaryItem('nie'))->setDictionaryId($dic),
            (new DictionaryItem('niee'))->setDictionaryId($dic),
            (new DictionaryItem('tk'))->setDictionaryId($dic)
        ]));
        $manager->persist($dic);
        $manager->flush();
    }
}

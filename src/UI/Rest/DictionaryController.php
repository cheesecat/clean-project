<?php

namespace Napoleon\UI\Rest;

use Napoleon\Application\Dictionary\Command\GetDictionaryCommand;
use Napoleon\Application\Dictionary\DictionaryAppService;
use Napoleon\DomainModel\Dictionary\DictionaryException;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

/**
 * Class DictionaryController
 * @package App\UI\Rest
 */
class DictionaryController extends AbstractController
{
    public function getDictionary(string $name)
    {
        try {
            $dictionaryService = $this->get(DictionaryAppService::class);
            $dic = $dictionaryService->getDictionary(new GetDictionaryCommand($name));
            dump($dic);
        } catch (DictionaryException $e) {
            return $this->json(['error' => 'Not found']);
        }
    }
}
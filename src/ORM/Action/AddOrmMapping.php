<?php


namespace Plugin\DevKit\ORM\Action;

use Plugin\DevKit\Annotations\Definition\AddAction;
use Plugin\DevKit\ORM\MappingContainer;
use Webmozart\Assert\Assert;

/**
 * @AddAction(id="Plugin\DevKit\ORM\Action\AddOrmMapping")
 */
class AddOrmMapping
{
    private $mappings;

    public function __construct(array $mappings)
    {
        Assert::allFileExists(array_keys($mappings));
        $this->mappings = $mappings;
    }

    public function __invoke(MappingContainer $mappingContainer)
    {
        $mappingContainer->add($this->mappings);
    }
}

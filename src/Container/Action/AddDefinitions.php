<?php
namespace Plugin\DevKit\Container\Action;


use DI\ContainerBuilder;
use Plugin\DevKit\Annotations\Definition\AddAction;
use Webmozart\Assert\Assert;

/**
 * @AddAction(id="Plugin\DevKit\Container\Action\AddDefinitions")
 */
class AddDefinitions
{
    private $definitions;

    public function __construct(string ...$definitions)
    {
        Assert::allFileExists($definitions);
        $this->definitions = $definitions;
    }

    public function __invoke(ContainerBuilder $builder)
    {
        foreach ($this->definitions as $definition) {
            $builder->addDefinitions($definition);
        }
    }
}

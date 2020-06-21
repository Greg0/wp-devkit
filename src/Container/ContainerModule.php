<?php

namespace Plugin\DevKit\Container;

use DI\ContainerBuilder;
use Plugin\DevKit\Container\Action\AddDefinitions;
use Psr\Container\ContainerInterface;

class ContainerModule
{
    /**
     * @var ContainerInterface|null
     */
    private $c;

    public function getContainer(): ContainerInterface
    {
        if ($this->c === null) {
            $builder = new ContainerBuilder();
            do_action(AddDefinitions::class, $builder);
            $this->c = $builder->build();
        }

        return $this->c;
    }
}

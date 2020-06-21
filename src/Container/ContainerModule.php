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
            if (WP_DEBUG === false) {
                $builder->enableCompilation(get_temp_dir());
                if(extension_loaded('apcu') && ini_get('apcu.enabled')) {
                    $builder->enableDefinitionCache();
                }
                $builder->writeProxiesToFile(true, get_temp_dir().'/php-di-proxies');
            }
            do_action(AddDefinitions::class, $builder);
            $this->c = $builder->build();
        }

        return $this->c;
    }
}

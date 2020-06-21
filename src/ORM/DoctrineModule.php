<?php

namespace Plugin\DevKit\ORM;


use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Events;
use Plugin\DevKit\Common\Environment;
use Plugin\DevKit\ORM\Action\AddOrmMapping;
use Plugin\DevKit\ORM\Entity\Term;

class DoctrineModule
{
    /** @var array */
    private $connection;

    /**
     * @var Environment
     */
    private $env;

    /**
     * @var \wpdb
     */
    private $wpdb;

    public function __construct(Environment $env, \wpdb $wpdb, array $connection)
    {
        $this->wpdb       = $wpdb;
        $this->env        = $env;
        $this->connection = $connection;
    }

    public function getEM(): EntityManager
    {
        if ($this->env->isProd() && extension_loaded('apcu') && ini_get('apcu.enabled')) {
            $cache = new \Doctrine\Common\Cache\ApcuCache();
        } else {
            $cache = new \Doctrine\Common\Cache\ArrayCache;
        }
        $config = new \Doctrine\ORM\Configuration();
        $mappingContainer = new MappingContainer();
        if (function_exists('do_action')) {
            do_action(AddOrmMapping::class, $mappingContainer);
        }
        $driver = new \Doctrine\ORM\Mapping\Driver\SimplifiedXmlDriver(
            $mappingContainer->getAll()
        );
        $config->setMetadataCacheImpl($cache);
        $config->setMetadataDriverImpl($driver);
        $config->setProxyDir($this->getTempDir() . '/doctrine');
        $config->setProxyNamespace('Plugin\DevKit\ORM\Proxy');
        $conn = [
            'driver' => 'pdo_mysql',
            'charset' => 'utf8mb4'
        ];

        $evm         = new \Doctrine\Common\EventManager;
        $tablePrefix = new TablePrefix($this->wpdb->get_blog_prefix()); // TODO: fixme for multisite
        $evm->addEventListener(Events::loadClassMetadata, $tablePrefix);

        return EntityManager::create(array_merge($conn, $this->connection), $config, $evm);
    }

    private function getTempDir()
    {
        if (function_exists('get_temp_dir')) {
            return get_temp_dir();
        }

        return '/tmp';
    }
}

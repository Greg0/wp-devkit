<?php

use Psr\Container\ContainerInterface;

return [
    wpdb::class => function() {
        return $GLOBALS['wpdb'];
    },
    \Plugin\DevKit\ORM\DoctrineModule::class => DI\autowire(\Plugin\DevKit\ORM\DoctrineModule::class)
    ->constructorParameter('connection', [
        'host'     => DB_HOST,
        'user'     => DB_USER,
        'password' => DB_PASSWORD,
        'dbname'   => DB_NAME,
        'charset'  => DB_CHARSET,
    ]),
    \Doctrine\ORM\EntityManager::class => function (ContainerInterface $c) {
        return $c->get(\Plugin\DevKit\ORM\DoctrineModule::class)->getEM();
    }
];

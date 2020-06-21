<?php

return [
    \Doctrine\ORM\EntityManager::class => function () {
        $orm = new \Plugin\DevKit\ORM\DoctrineModule(
            new \Plugin\DevKit\Common\Environment(),
            [
                'host'     => DB_HOST,
                'user'     => DB_USER,
                'password' => DB_PASSWORD,
                'dbname'   => DB_NAME,
                'charset'  => DB_CHARSET,
            ]
        );

        return $orm->getEM();
    }
];

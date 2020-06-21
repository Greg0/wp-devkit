<?php
/**
 * Plugin Name: DevKit Plugin
 */

require_once __DIR__.'/vendor/autoload.php';

$ann = new \Plugin\DevKit\Annotations\AnnotationHandler();
$ann->register(
    new \Plugin\DevKit\Container\Action\AddDefinitions(
        __DIR__ . '/config/di.php'
    ),
    new \Plugin\DevKit\ORM\Action\AddOrmMapping([
        __DIR__ . '/config/entity' => 'Plugin\DevKit\ORM\Entity'
    ])
);

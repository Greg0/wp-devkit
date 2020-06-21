<?php

require_once dirname(__FILE__, 4) . '/wp-load.php';
require_once __DIR__.'/plugin-dev-kit.php';

$cm = new \Plugin\DevKit\Container\ContainerModule();
$c = $cm->getContainer();
$em = $c->get(\Doctrine\ORM\EntityManager::class);
return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($em);

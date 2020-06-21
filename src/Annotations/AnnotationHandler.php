<?php

namespace Plugin\DevKit\Annotations;


use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\IndexedReader;
use Doctrine\Common\Annotations\Reader;
use Plugin\DevKit\Annotations\Definition\CallableAnnotation;

class AnnotationHandler
{
    /**
     * @var Reader
     */
    private $reader;

    public function __construct()
    {
        AnnotationRegistry::registerLoader('class_exists');
        $this->reader = new IndexedReader(new AnnotationReader());
    }

    public function register(object ...$instances): void
    {
        foreach ($instances as $instance) {
            $ref = new \ReflectionClass($instance);

            $this->handleClassAnnotations($instance, $ref);
            $this->handleMethodAnnotations($instance, $ref);
        }
    }

    private function handleClassAnnotations(object $instance, \ReflectionClass $ref)
    {
        $anns = $this->reader->getClassAnnotations($ref);
        foreach ($anns as $ann) {
            if ($ann instanceof CallableAnnotation && is_callable($instance)) {
                $ann->call($instance);
            }
        }
    }

    private function handleMethodAnnotations(object $instance, \ReflectionClass $ref)
    {
        foreach ($ref->getMethods() as $method) {
            $anns = $this->reader->getMethodAnnotations($method);

            foreach ($anns as $ann) {
                if ($ann instanceof CallableAnnotation) {
                    $ann->call($method->getClosure($instance));
                }
            }
        }
    }
}

<?php


namespace Plugin\DevKit\Annotations\Definition;


interface CallableAnnotation
{
    public function call(callable $callable): void;
}

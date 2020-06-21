<?php


namespace Plugin\DevKit\ORM;


class MappingContainer
{
    private $mappings = [];

    public function add(array $mappings): void
    {
        $this->mappings = array_merge($this->mappings, $mappings);
    }

    public function getAll(): array
    {
        return $this->mappings;
    }
}
